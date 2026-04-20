<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">👥 Daftar Tamu Undangan</h1>
                    <p class="text-gray-500 text-sm">Kelola semua tamu undangan</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.wa.settings') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition">
                        <i class="fab fa-whatsapp mr-1"></i> Edit Template WA
                    </a>
                    <a href="{{ route('admin.index', ['event' => $event]) }}" class="text-blue-600 hover:text-blue-800 text-sm py-2">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>

            <!-- Event Filter -->
            <div class="mt-6 flex bg-gray-100 rounded-lg p-1 w-full max-w-sm">
                <a href="{{ route('admin.guests', ['event' => 'resepsi']) }}" 
                   class="flex-1 text-center py-2 rounded-md text-sm font-medium transition-all duration-200 {{ (!request()->has('event') || request('event') == 'resepsi') ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:bg-gray-200' }}">
                   Akad & Resepsi
                </a>
                <a href="{{ route('admin.guests', ['event' => 'ngunduh_mantu']) }}" 
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
                <p class="text-3xl font-bold text-blue-600">{{ $guests->where('wa_sent', true)->count() }}</p>
                <p class="text-gray-500 text-sm">Sudah di-Chat</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-gray-600">{{ $guests->where('wa_sent', false)->count() }}</p>
                <p class="text-gray-500 text-sm">Belum di-Chat</p>
            </div>
        </div>

        <!-- Guest Management -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
            <div class="bg-purple-800 text-white px-6 py-4">
                <h2 class="font-bold"><i class="fas fa-users mr-2"></i> Kelola Tamu Undangan</h2>
            </div>

            <div class="p-6 space-y-6">
                <!-- Add Guest Form -->
                <div class="bg-purple-50 rounded-lg p-4">
                    <h3 class="font-bold text-purple-800 mb-3"><i class="fas fa-user-plus mr-2"></i>Tambah Tamu Manual
                    </h3>
                    <form action="{{ route('admin.guest.add') }}" method="POST" class="grid grid-cols-4 gap-3">
                        @csrf
                        <input type="hidden" name="event_type" value="{{ $event ?? 'resepsi' }}">
                        <input type="text" name="name" placeholder="Nama Tamu *" required
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        <input type="text" name="phone" placeholder="No. Telepon"
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        <input type="text" name="address" placeholder="Alamat"
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-plus mr-1"></i> Tambah
                        </button>
                    </form>
                </div>

                <!-- Import Excel -->
                <div class="bg-blue-50 rounded-lg p-4">
                    <h3 class="font-bold text-blue-800 mb-3"><i class="fas fa-file-excel mr-2"></i>Import dari Excel/CSV
                    </h3>
                    <div class="flex gap-3 items-center">
                        <a href="{{ route('admin.download.template') }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition text-sm">
                            <i class="fas fa-download mr-1"></i> Download Template
                        </a>
                        <form action="{{ route('admin.import.guests') }}" method="POST" enctype="multipart/form-data"
                            class="flex gap-2 flex-1">
                            @csrf
                            <input type="hidden" name="event_type" value="{{ $event ?? 'resepsi' }}">
                            <input type="file" name="file" accept=".csv,.xlsx,.xls" required
                                class="flex-1 px-3 py-2 border rounded-lg text-sm">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition text-sm">
                                <i class="fas fa-upload mr-1"></i> Import
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk WA Action Bar -->
        <div id="bulkActionBar"
            class="hidden bg-green-600 text-white rounded-xl shadow-lg p-4 mb-6 flex items-center justify-between sticky top-4 z-10">
            <div>
                <span id="selectedCount">0</span> tamu dipilih
            </div>
            <div class="flex gap-3">
                <button onclick="sendBulkWa()"
                    class="bg-white text-green-600 px-4 py-2 rounded-lg font-bold hover:bg-green-50 transition">
                    <i class="fab fa-whatsapp mr-1"></i> Kirim WA ke Terpilih
                </button>
                <button onclick="clearSelection()"
                    class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
            </div>
        </div>

        <!-- Guest List -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gray-800 text-white px-6 py-4 flex items-center justify-between">
                <h2 class="font-bold"><i class="fas fa-list mr-2"></i> Daftar Tamu ({{ $guests->count() }})</h2>
                <div class="flex gap-2">
                    <button onclick="selectAllWithPhone()"
                        class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs transition">
                        <i class="fas fa-check-double mr-1"></i> Pilih Semua (Ada No HP)
                    </button>
                    <button onclick="selectNotSent()"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-xs transition">
                        <i class="fas fa-clock mr-1"></i> Pilih Belum di-Chat
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-center">
                                <input type="checkbox" id="selectAll" onclick="toggleSelectAll()" class="w-4 h-4">
                            </th>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-left">Telepon</th>
                            <th class="px-4 py-3 text-center">Status Buka</th>
                            <th class="px-4 py-3 text-left">Link Undangan</th>
                            <th class="px-4 py-3 text-center">WhatsApp</th>
                            <th class="px-4 py-3 text-center">Status WA</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guests as $index => $guest)
                            @php
                                $waNumber = '';
                                if ($guest->phone) {
                                    $waNumber = preg_replace('/[^0-9]/', '', $guest->phone);
                                    if (substr($waNumber, 0, 1) === '0') {
                                        $waNumber = '62' . substr($waNumber, 1);
                                    }
                                }
                                $routePrefix = ($guest->event_type === 'ngunduh_mantu') ? '/ngunduh-mantu/' : '/undangan/';
                                $inviteLink = url($routePrefix . $guest->slug);
                            @endphp
                            <tr class="border-b hover:bg-gray-50" data-guest-id="{{ $guest->id }}"
                                data-phone="{{ $waNumber }}" data-name="{{ $guest->name }}" data-link="{{ $inviteLink }}"
                                data-wa-sent="{{ $guest->wa_sent ? '1' : '0' }}">
                                <td class="px-4 py-3 text-center">
                                    @if($guest->phone)
                                        <input type="checkbox" class="guest-checkbox w-4 h-4" value="{{ $guest->id }}"
                                            onchange="updateSelection()">
                                    @else
                                        <span class="text-gray-300">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium">{{ $guest->name }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $guest->phone ?: '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($guest->has_opened)
                                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Dibuka</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full">Belum</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-1">
                                        <input type="text" value="{{ $inviteLink }}"
                                            class="text-xs bg-gray-100 px-2 py-1 rounded w-48 truncate"
                                            id="link-{{ $guest->id }}" readonly>
                                        <button onclick="copyLink('link-{{ $guest->id }}')"
                                            class="text-blue-600 hover:text-blue-800 px-2">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($guest->phone)
                                        <button
                                            onclick="sendSingleWa('{{ $waNumber }}', '{{ $guest->name }}', '{{ $inviteLink }}')"
                                            class="inline-flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs transition">
                                            <i class="fab fa-whatsapp"></i> Chat
                                        </button>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <button onclick="toggleGuestWa({{ $guest->id }}, this)"
                                        class="{{ $guest->wa_sent ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }} text-xs px-3 py-1 rounded-full transition"
                                        title="{{ $guest->wa_sent ? 'Sudah di-chat, klik untuk ubah' : 'Belum di-chat, klik untuk ubah' }}">
                                        <i class="fas {{ $guest->wa_sent ? 'fa-check' : 'fa-times' }}"></i>
                                        <span>{{ $guest->wa_sent ? 'Sudah' : 'Belum' }}</span>
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            onclick="openEditModal({{ $guest->id }}, '{{ addslashes($guest->name) }}', '{{ $guest->phone }}', '{{ addslashes($guest->address) }}')"
                                            class="text-blue-500 hover:text-blue-700" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.guest.delete', $guest->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus tamu {{ $guest->name }}?')" class="inline">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-gray-400">
                                    Belum ada tamu. Tambahkan manual atau import dari Excel.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
                <div class="bg-purple-800 text-white px-6 py-4 rounded-t-xl">
                    <h3 class="font-bold"><i class="fas fa-edit mr-2"></i>Edit Data Tamu</h3>
                </div>
                <form id="editForm" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nama *</label>
                        <input type="text" name="name" id="editName" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">No. Telepon</label>
                        <input type="text" name="phone" id="editPhone"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                        <input type="text" name="address" id="editAddress"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                        <button type="button" onclick="closeEditModal()"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 rounded-lg transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-400 text-xs mt-8">
            <p>Admin Panel - Fira & Eko Wedding</p>
        </div>
    </div>

    <script>
        // Store WA template
        const waTemplate = @json($template);

        function openEditModal(id, name, phone, address) {
            document.getElementById('editForm').action = '/admin-fira-eko/update-guest/' + id;
            document.getElementById('editName').value = name;
            document.getElementById('editPhone').value = phone || '';
            document.getElementById('editAddress').value = address || '';
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        function copyLink(inputId) {
            const input = document.getElementById(inputId);
            input.select();
            document.execCommand('copy');
            alert('Link undangan berhasil disalin!');
        }

        function getWaMessage(name, link) {
            return waTemplate
                .replace(/{nama}/g, name)
                .replace(/{link}/g, link);
        }

        function sendSingleWa(phone, name, link) {
            const message = getWaMessage(name, link);
            window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank');
        }

        function updateSelection() {
            const checkboxes = document.querySelectorAll('.guest-checkbox:checked');
            const count = checkboxes.length;
            const bar = document.getElementById('bulkActionBar');
            const countSpan = document.getElementById('selectedCount');

            if (count > 0) {
                bar.classList.remove('hidden');
                countSpan.textContent = count;
            } else {
                bar.classList.add('hidden');
            }
        }

        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.guest-checkbox');
            checkboxes.forEach(cb => cb.checked = selectAll.checked);
            updateSelection();
        }

        function selectAllWithPhone() {
            const checkboxes = document.querySelectorAll('.guest-checkbox');
            checkboxes.forEach(cb => cb.checked = true);
            updateSelection();
        }

        function selectNotSent() {
            const rows = document.querySelectorAll('tr[data-guest-id]');
            rows.forEach(row => {
                const checkbox = row.querySelector('.guest-checkbox');
                const waSent = row.dataset.waSent === '1';
                if (checkbox && !waSent) {
                    checkbox.checked = true;
                }
            });
            updateSelection();
        }

        function clearSelection() {
            const checkboxes = document.querySelectorAll('.guest-checkbox');
            checkboxes.forEach(cb => cb.checked = false);
            document.getElementById('selectAll').checked = false;
            updateSelection();
        }

        function sendBulkWa() {
            const checkboxes = document.querySelectorAll('.guest-checkbox:checked');
            if (checkboxes.length === 0) {
                alert('Pilih tamu terlebih dahulu!');
                return;
            }

            if (checkboxes.length > 10) {
                if (!confirm(`Anda akan membuka ${checkboxes.length} tab WhatsApp. Browser mungkin memblokir pop-up. Lanjutkan?`)) {
                    return;
                }
            }

            let delay = 0;
            checkboxes.forEach((cb, index) => {
                const row = cb.closest('tr');
                const phone = row.dataset.phone;
                const name = row.dataset.name;
                const link = row.dataset.link;

                setTimeout(() => {
                    sendSingleWa(phone, name, link);
                }, delay);
                delay += 500; // 500ms delay between each
            });

            clearSelection();
        }

        async function toggleGuestWa(id, btn) {
            btn.disabled = true;
            btn.classList.add('opacity-50');

            try {
                const response = await fetch(`/admin-fira-eko/toggle-wa-ajax/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    const icon = btn.querySelector('i');
                    const text = btn.querySelector('span');
                    const row = btn.closest('tr');

                    if (data.wa_sent) {
                        btn.className = 'bg-green-100 text-green-700 hover:bg-green-200 text-xs px-3 py-1 rounded-full transition';
                        btn.title = 'Sudah di-chat, klik untuk ubah';
                        icon.className = 'fas fa-check';
                        text.textContent = 'Sudah';
                        row.dataset.waSent = '1';
                    } else {
                        btn.className = 'bg-gray-100 text-gray-500 hover:bg-gray-200 text-xs px-3 py-1 rounded-full transition';
                        btn.title = 'Belum di-chat, klik untuk ubah';
                        icon.className = 'fas fa-times';
                        text.textContent = 'Belum';
                        row.dataset.waSent = '0';
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal mengubah status');
            }

            btn.disabled = false;
            btn.classList.remove('opacity-50');
        }
    </script>
</body>

</html>