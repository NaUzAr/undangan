<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kehadiran - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">📋 Konfirmasi Kehadiran</h1>
                    <p class="text-gray-500 text-sm">Daftar tamu yang sudah konfirmasi kehadiran</p>
                </div>
                <a href="{{ route('admin.index', ['event' => $event]) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Dashboard
                </a>
            </div>

            <!-- Event Filter -->
            <div class="mt-6 flex bg-gray-100 rounded-lg p-1 w-full max-w-sm">
                <a href="{{ route('admin.rsvp', ['event' => 'resepsi']) }}" 
                   class="flex-1 text-center py-2 rounded-md text-sm font-medium transition-all duration-200 {{ (!request()->has('event') || request('event') == 'resepsi') ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:bg-gray-200' }}">
                   Akad & Resepsi
                </a>
                <a href="{{ route('admin.rsvp', ['event' => 'ngunduh_mantu']) }}" 
                   class="flex-1 text-center py-2 rounded-md text-sm font-medium transition-all duration-200 {{ (request('event') == 'ngunduh_mantu') ? 'bg-white text-green-600 shadow-sm' : 'text-gray-500 hover:bg-gray-200' }}">
                   Ngunduh Mantu
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Stats -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-green-600">{{ $rsvps->where('attendance', 'yes')->count() }}</p>
                <p class="text-gray-500 text-sm">Hadir</p>
                <p class="text-xs text-green-500 mt-1">{{ $rsvps->where('attendance', 'yes')->sum('guests') }} tamu</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-red-600">{{ $rsvps->where('attendance', 'no')->count() }}</p>
                <p class="text-gray-500 text-sm">Tidak Hadir</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-yellow-600">{{ $rsvps->where('attendance', 'maybe')->count() }}</p>
                <p class="text-gray-500 text-sm">Ragu-ragu</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-blue-600">{{ $rsvps->count() }}</p>
                <p class="text-gray-500 text-sm">Total Responden</p>
            </div>
        </div>

        <!-- RSVP Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-orange-700 text-white px-6 py-4 flex items-center justify-between">
                <h2 class="font-bold"><i class="fas fa-clipboard-check mr-2"></i> Data Konfirmasi
                    ({{ $rsvps->count() }})</h2>
                <a href="{{ route('admin.download.rsvp', ['event' => $event]) }}"
                    class="bg-white text-orange-700 px-4 py-2 rounded-lg text-sm font-bold hover:bg-orange-100 transition">
                    <i class="fas fa-download mr-1"></i> Download CSV
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-center">Kehadiran</th>
                            <th class="px-4 py-3 text-center">Jumlah Tamu</th>
                            <th class="px-4 py-3 text-left">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rsvps as $index => $rsvp)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium">{{ $rsvp->name }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($rsvp->attendance === 'yes')
                                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Hadir</span>
                                    @elseif($rsvp->attendance === 'no')
                                        <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full">Tidak Hadir</span>
                                    @else
                                        <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-full">Ragu</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">{{ $rsvp->guests }} orang</td>
                                <td class="px-4 py-3 text-gray-500">{{ $rsvp->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-400">
                                    Belum ada konfirmasi kehadiran
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-400 text-xs mt-8">
            <p>Admin Panel - Fira & Eko Wedding</p>
        </div>
    </div>
</body>

</html>