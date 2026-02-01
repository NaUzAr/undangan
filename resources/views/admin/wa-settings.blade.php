<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan WA - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">⚙️ Pengaturan Template WA</h1>
                    <p class="text-gray-500 text-sm">Edit template pesan WhatsApp</p>
                </div>
                <a href="{{ route('admin.guests') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
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

        <!-- Template Form -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
            <div class="bg-green-600 text-white px-6 py-4">
                <h2 class="font-bold"><i class="fab fa-whatsapp mr-2"></i> Template Pesan WhatsApp</h2>
            </div>

            <div class="p-6">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <h3 class="font-bold text-yellow-800 mb-2"><i class="fas fa-info-circle mr-1"></i> Variabel yang
                        tersedia:</h3>
                    <ul class="text-sm text-yellow-700 space-y-1">
                        <li><code class="bg-yellow-100 px-1 rounded">{nama}</code> - Nama tamu</li>
                        <li><code class="bg-yellow-100 px-1 rounded">{link}</code> - Link undangan personal</li>
                    </ul>
                </div>

                <form action="{{ route('admin.wa.settings.save') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Template Pesan:</label>
                        <textarea name="template" rows="15"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none font-mono text-sm"
                            placeholder="Tulis template pesan WhatsApp...">{{ $template }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
                            <i class="fas fa-save mr-1"></i> Simpan Template
                        </button>
                        <button type="button" onclick="resetTemplate()"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition">
                            <i class="fas fa-undo mr-1"></i> Reset ke Default
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gray-800 text-white px-6 py-4">
                <h2 class="font-bold"><i class="fas fa-eye mr-2"></i> Preview Pesan</h2>
            </div>
            <div class="p-6">
                <div id="preview" class="bg-gray-50 rounded-lg p-4 whitespace-pre-wrap text-sm font-mono">
                    {{ str_replace(['{nama}', '{link}'], ['Budi Santoso', 'https://example.com/undangan/budi-santoso'], $template) }}
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-400 text-xs mt-8">
            <p>Admin Panel - Fira & Eko Wedding</p>
        </div>
    </div>

    <script>
        const defaultTemplate = `Kepada Yth.
Bapak/Ibu/Saudara/i
*{nama}*
_____________________

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami.

*Berikut link undangan kami*, untuk info lengkap dari acara, bisa kunjungi :

{link}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Terima Kasih

Hormat kami,
Ahya & Eko
____________________`;

        function resetTemplate() {
            if (confirm('Reset template ke default?')) {
                document.querySelector('textarea[name="template"]').value = defaultTemplate;
                updatePreview();
            }
        }

        function updatePreview() {
            const template = document.querySelector('textarea[name="template"]').value;
            const preview = template
                .replace(/{nama}/g, 'Budi Santoso')
                .replace(/{link}/g, 'https://example.com/undangan/budi-santoso');
            document.getElementById('preview').textContent = preview;
        }

        document.querySelector('textarea[name="template"]').addEventListener('input', updatePreview);
    </script>
</body>

</html>