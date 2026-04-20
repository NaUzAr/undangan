<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;
use App\Models\Wish;
use App\Models\Guest;

class InvitationController extends Controller
{
    public function index()
    {
        $wishes = Wish::where('event_type', 'resepsi')->latest()->get();
        $guest = null; // No guest for general invitation
        return view('welcome', compact('wishes', 'guest'));
    }

    /**
     * Show personalized invitation for a specific guest
     */
    public function showPersonalized($slug)
    {
        $guest = Guest::where('slug', $slug)->firstOrFail();

        // Mark as opened if first time
        if (!$guest->has_opened) {
            $guest->update([
                'has_opened' => true,
                'opened_at' => now(),
            ]);
        }

        $wishes = Wish::where('event_type', 'resepsi')->latest()->get();
        return view('welcome', compact('wishes', 'guest'));
    }

    public function ngunduhMantu()
    {
        $wishes = Wish::where('event_type', 'ngunduh_mantu')->latest()->get();
        $guest = null;
        return view('ngunduh-mantu', compact('wishes', 'guest'));
    }

    public function showPersonalizedNgunduhMantu($slug)
    {
        $guest = Guest::where('slug', $slug)->firstOrFail();

        if (!$guest->has_opened) {
            $guest->update([
                'has_opened' => true,
                'opened_at' => now(),
            ]);
        }

        $wishes = Wish::where('event_type', 'ngunduh_mantu')->latest()->get();
        return view('ngunduh-mantu', compact('wishes', 'guest'));
    }

    public function storeRSVP(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attendance' => 'required|in:yes,no,maybe',
            'guests' => 'required|integer|min:1|max:5',
            'event_type' => 'nullable|string|in:resepsi,ngunduh_mantu',
        ]);

        $event_type = $validated['event_type'] ?? 'resepsi';
        
        $rsvpData = $validated;
        $rsvpData['event_type'] = $event_type;

        Rsvp::create($rsvpData);

        $routeName = ($event_type === 'ngunduh_mantu') ? 'ngunduh-mantu' : 'home';
        return redirect()->route($routeName)->with('success', 'RSVP Berhasil dikirim! Terima kasih.');
    }

    public function storeWish(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/quicktime|max:51200', // Max 50MB
            'event_type' => 'nullable|string|in:resepsi,ngunduh_mantu',
        ]);

        $event_type = $validated['event_type'] ?? 'resepsi';

        $wishData = [
            'name' => $validated['name'],
            'message' => $validated['message'] ?? '',
            'event_type' => $event_type,
        ];

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $filename);
            $wishData['video_path'] = 'uploads/videos/' . $filename;
        }

        Wish::create($wishData);

        $routeName = ($event_type === 'ngunduh_mantu') ? 'ngunduh-mantu' : 'home';
        return redirect()->route($routeName)->with('success', 'Ucapan berhasil dikirim!')->with('skip_cover', true);
    }
}
