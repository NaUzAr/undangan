<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Models\Guest;
use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Show admin panel with all wishes, guests, and RSVPs
     */
    public function index()
    {
        $wishes = Wish::orderBy('created_at', 'desc')->get();
        $guests = Guest::orderBy('created_at', 'desc')->get();
        $rsvps = Rsvp::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('wishes', 'guests', 'rsvps'));
    }

    /**
     * Show RSVP page
     */
    public function rsvpIndex()
    {
        $rsvps = Rsvp::orderBy('created_at', 'desc')->get();
        return view('admin.rsvp', compact('rsvps'));
    }

    /**
     * Show Guest management page
     */
    public function guestsIndex()
    {
        $guests = Guest::orderBy('created_at', 'desc')->get();
        $template = $this->getWaTemplate();
        return view('admin.guests', compact('guests', 'template'));
    }

    /**
     * Show WA Settings page
     */
    public function waSettings()
    {
        $template = $this->getWaTemplate();
        return view('admin.wa-settings', compact('template'));
    }

    /**
     * Save WA template
     */
    public function saveWaSettings(Request $request)
    {
        $template = $request->input('template');
        $storagePath = storage_path('app/wa_template.txt');
        File::put($storagePath, $template);

        return redirect()->route('admin.wa.settings')->with('success', 'Template berhasil disimpan!');
    }

    /**
     * Get WA template from storage or config
     */
    private function getWaTemplate()
    {
        $storagePath = storage_path('app/wa_template.txt');
        if (File::exists($storagePath)) {
            return File::get($storagePath);
        }
        return config('whatsapp.template');
    }

    /**
     * Get WA template via AJAX for guests page
     */
    public function getWaTemplateApi()
    {
        return response()->json([
            'template' => $this->getWaTemplate()
        ]);
    }

    /**
     * Delete a wish
     */
    public function deleteWish($id)
    {
        $wish = Wish::findOrFail($id);

        // Delete associated video file if exists
        if ($wish->video_path && file_exists(public_path($wish->video_path))) {
            unlink(public_path($wish->video_path));
        }

        $wish->delete();

        return redirect()->route('admin.index')->with('success', 'Pesan berhasil dihapus!');
    }

    /**
     * Add a single guest manually
     */
    public function addGuest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        $guest = Guest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'slug' => Guest::generateSlug($request->name),
        ]);

        return redirect()->route('admin.guests')->with('success', 'Tamu "' . $guest->name . '" berhasil ditambahkan!');
    }

    /**
     * Update a guest
     */
    public function updateGuest(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.guests')->with('success', 'Data tamu "' . $guest->name . '" berhasil diupdate!');
    }

    /**
     * Delete a guest
     */
    public function deleteGuest($id)
    {
        $guest = Guest::findOrFail($id);
        $name = $guest->name;
        $guest->delete();

        return redirect()->route('admin.guests')->with('success', 'Tamu "' . $name . '" berhasil dihapus!');
    }

    /**
     * Toggle WA sent status
     */
    public function toggleWaSent($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->wa_sent = !$guest->wa_sent;
        $guest->save();

        $status = $guest->wa_sent ? 'sudah dikirim' : 'belum dikirim';
        return redirect()->route('admin.index')->with('success', 'Status WA "' . $guest->name . '" diubah menjadi ' . $status);
    }

    /**
     * Toggle WA sent status via AJAX (Guest)
     */
    public function toggleWaSentAjax($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->wa_sent = !$guest->wa_sent;
        $guest->save();

        return response()->json([
            'success' => true,
            'wa_sent' => $guest->wa_sent,
            'name' => $guest->name
        ]);
    }

    /**
     * Toggle RSVP WA sent status via AJAX
     */
    public function toggleRsvpWaSentAjax($id)
    {
        $rsvp = Rsvp::findOrFail($id);
        $rsvp->wa_sent = !$rsvp->wa_sent;
        $rsvp->save();

        return response()->json([
            'success' => true,
            'wa_sent' => $rsvp->wa_sent,
            'name' => $rsvp->name
        ]);
    }

    /**
     * Download Excel template
     */
    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_tamu.csv"',
        ];

        $columns = ['Nama', 'No. Telepon', 'Alamat'];
        $examples = [
            ['Budi Santoso', '08123456789', 'Jl. Merdeka No. 10, Semarang'],
            ['Siti Rahayu', '08198765432', 'Jl. Sudirman No. 25, Jakarta'],
        ];

        $callback = function () use ($columns, $examples) {
            $file = fopen('php://output', 'w');
            // Add BOM for Excel UTF-8 compatibility
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($file, $columns);
            foreach ($examples as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Import guests from CSV/Excel
     */
    public function importGuests(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx,xls|max:5120',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $imported = 0;
        $errors = [];

        // Handle CSV files
        if (in_array($extension, ['csv', 'txt'])) {
            $handle = fopen($file->getPathname(), 'r');
            $header = fgetcsv($handle); // Skip header row

            while (($row = fgetcsv($handle)) !== false) {
                if (count($row) >= 1 && !empty(trim($row[0]))) {
                    try {
                        Guest::create([
                            'name' => trim($row[0]),
                            'phone' => isset($row[1]) ? trim($row[1]) : null,
                            'address' => isset($row[2]) ? trim($row[2]) : null,
                            'slug' => Guest::generateSlug(trim($row[0])),
                        ]);
                        $imported++;
                    } catch (\Exception $e) {
                        $errors[] = "Baris: " . $row[0] . " - " . $e->getMessage();
                    }
                }
            }
            fclose($handle);
        }

        $message = $imported . ' tamu berhasil diimport!';
        if (count($errors) > 0) {
            $message .= ' (' . count($errors) . ' error)';
        }

        return redirect()->route('admin.index')->with('success', $message);
    }

    /**
     * Toggle RSVP WA sent status
     */
    public function toggleRsvpWaSent($id)
    {
        $rsvp = Rsvp::findOrFail($id);
        $rsvp->wa_sent = !$rsvp->wa_sent;
        $rsvp->save();

        $status = $rsvp->wa_sent ? 'sudah di-chat' : 'belum di-chat';
        return redirect()->route('admin.index')->with('success', 'Status WA "' . $rsvp->name . '" diubah menjadi ' . $status);
    }

    /**
     * Download RSVP data as CSV
     */
    public function downloadRsvp()
    {
        $rsvps = Rsvp::orderBy('created_at', 'desc')->get();

        // Calculate summary
        $hadirCount = $rsvps->where('attendance', 'yes')->count();
        $tidakHadirCount = $rsvps->where('attendance', 'no')->count();
        $raguCount = $rsvps->where('attendance', 'maybe')->count();
        $totalGuests = $rsvps->where('attendance', 'yes')->sum('guests');

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_kehadiran.csv"',
        ];

        $columns = ['Nama', 'Kehadiran', 'Jumlah Tamu', 'Waktu Submit'];

        $callback = function () use ($rsvps, $columns, $hadirCount, $tidakHadirCount, $raguCount, $totalGuests) {
            $file = fopen('php://output', 'w');
            // Add BOM for Excel UTF-8 compatibility
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($file, $columns);

            foreach ($rsvps as $rsvp) {
                $attendance = match ($rsvp->attendance) {
                    'yes' => 'Hadir',
                    'no' => 'Tidak Hadir',
                    'maybe' => 'Ragu-ragu',
                    default => $rsvp->attendance,
                };

                fputcsv($file, [
                    $rsvp->name,
                    $attendance,
                    $rsvp->guests,
                    $rsvp->created_at->format('d/m/Y H:i'),
                ]);
            }

            // Add empty row as separator
            fputcsv($file, ['', '', '', '']);

            // Add summary section
            fputcsv($file, ['=== KESIMPULAN ===', '', '', '']);
            fputcsv($file, ['Hadir', $hadirCount . ' orang', 'Total Tamu: ' . $totalGuests, '']);
            fputcsv($file, ['Tidak Hadir', $tidakHadirCount . ' orang', '', '']);
            fputcsv($file, ['Ragu-ragu', $raguCount . ' orang', '', '']);
            fputcsv($file, ['Total Responden', ($hadirCount + $tidakHadirCount + $raguCount) . ' orang', '', '']);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
