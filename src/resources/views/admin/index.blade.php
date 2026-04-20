<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kelola Tamu & Pesan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">🛡️ Admin Panel</h1>
                    <p class="text-gray-500 text-sm">Kelola tamu undangan & pesan</p>
                </div>
                <a href="/" class="text-blue-600 hover:text-blue-800 text-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>
            
            <!-- Event Filter -->
            <div class="mt-6 flex bg-gray-100 rounded-lg p-1 w-full max-w-sm">
                <a href="{{ route('admin.index', ['event' => 'resepsi']) }}" 
                   class="flex-1 text-center py-2 rounded-md text-sm font-medium transition-all duration-200 {{ (!request()->has('event') || request('event') == 'resepsi') ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:bg-gray-200' }}">
                   Akad & Resepsi
                </a>
                <a href="{{ route('admin.index', ['event' => 'ngunduh_mantu']) }}" 
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
                <p class="text-3xl font-bold text-purple-600">{{ $guests->count() }}</p>
                <p class="text-gray-500 text-sm">Total Tamu</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-green-600">{{ $guests->where('has_opened', true)->count() }}</p>
                <p class="text-gray-500 text-sm">Sudah Buka</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-orange-600">{{ $rsvps->where('attendance', 'yes')->count() }}</p>
                <p class="text-gray-500 text-sm">Konfirmasi Hadir</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-blue-600">{{ $wishes->count() }}</p>
                <p class="text-gray-500 text-sm">Total Pesan</p>
            </div>
        </div>

        <!-- Quick Navigation with Summary -->
        <div class="grid grid-cols-2 gap-6 mb-6">
            <!-- RSVP Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4">
                    <h3 class="text-lg font-bold"><i class="fas fa-clipboard-check mr-2"></i>Konfirmasi Kehadiran</h3>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-4 gap-2 text-center mb-4">
                        <div class="bg-green-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-green-600">
                                {{ $rsvps->where('attendance', 'yes')->count() }}</p>
                            <p class="text-xs text-green-500">Hadir</p>
                        </div>
                        <div class="bg-red-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-red-600">{{ $rsvps->where('attendance', 'no')->count() }}
                            </p>
                            <p class="text-xs text-red-500">Tidak</p>
                        </div>
                        <div class="bg-yellow-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-yellow-600">
                                {{ $rsvps->where('attendance', 'maybe')->count() }}</p>
                            <p class="text-xs text-yellow-500">Ragu</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-blue-600">{{ $rsvps->count() }}</p>
                            <p class="text-xs text-blue-500">Total</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.rsvp') }}"
                        class="block w-full bg-orange-500 hover:bg-orange-600 text-white text-center py-2 rounded-lg transition text-sm font-medium">
                        <i class="fas fa-arrow-right mr-1"></i> Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Guests Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-4">
                    <h3 class="text-lg font-bold"><i class="fas fa-users mr-2"></i>Daftar Tamu</h3>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-4 gap-2 text-center mb-4">
                        <div class="bg-purple-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-purple-600">{{ $guests->count() }}</p>
                            <p class="text-xs text-purple-500">Total</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-green-600">
                                {{ $guests->where('has_opened', true)->count() }}</p>
                            <p class="text-xs text-green-500">Dibuka</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-blue-600">{{ $guests->where('wa_sent', true)->count() }}
                            </p>
                            <p class="text-xs text-blue-500">Di-Chat</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-2">
                            <p class="text-xl font-bold text-gray-600">{{ $guests->where('wa_sent', false)->count() }}
                            </p>
                            <p class="text-xs text-gray-500">Belum</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.guests') }}"
                        class="block w-full bg-purple-500 hover:bg-purple-600 text-white text-center py-2 rounded-lg transition text-sm font-medium">
                        <i class="fas fa-arrow-right mr-1"></i> Kelola Tamu
                    </a>
                </div>
            </div>
        </div>


        <!-- MESSAGES SECTION -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gray-800 text-white px-6 py-4">
                <h2 class="font-bold"><i class="fas fa-comments mr-2"></i> Pesan & Ucapan ({{ $wishes->count() }})</h2>
            </div>

            @forelse($wishes as $wish)
                <div class="border-b border-gray-200 p-4 hover:bg-gray-50">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-800">{{ $wish->name }}</span>
                                <span class="text-xs text-gray-400">{{ $wish->created_at->diffForHumans() }}</span>
                                @if($wish->video_path)
                                    <span class="bg-purple-100 text-purple-700 text-xs px-2 py-0.5 rounded-full">
                                        <i class="fas fa-video"></i> Video
                                    </span>
                                @endif
                            </div>
                            <p class="text-gray-600 text-sm">{{ $wish->message }}</p>
                            @if($wish->video_path)
                                <div class="mt-2">
                                    <video src="{{ asset($wish->video_path) }}" controls
                                        class="w-48 h-32 rounded object-cover"></video>
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('admin.delete.wish', $wish->id) }}" method="POST"
                            onsubmit="return confirm('Hapus pesan dari {{ $wish->name }}?')">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">
                    <i class="fas fa-inbox text-4xl mb-2 opacity-50"></i>
                    <p>Belum ada pesan</p>
                </div>
            @endforelse
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-400 text-xs mt-8">
            <p>Admin Panel - Fira & Eko Wedding</p>
        </div>
    </div>

    <script>
        function copyLink(inputId) {
            const input = document.getElementById(inputId);
            input.select();
            document.execCommand('copy');
            alert('Link undangan berhasil disalin!');
        }
    </script>
</body>

</html>