<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri SIPESADE - Dokumentasi Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans">
    
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="/" class="p-2 bg-slate-100 hover:bg-emerald-50 rounded-full text-slate-500 hover:text-emerald-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-slate-800">Galeri SIPESADE</h1>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-20">
        <div class="mb-20">
            <h2 class="text-5xl font-black text-slate-900 mb-6 tracking-tight">Aksi Nyata <span class="text-emerald-600 italic">Kebersihan Desa</span></h2>
            <p class="text-lg text-slate-500 max-w-2xl leading-relaxed">Dokumentasi kegiatan pengelolaan sampah, edukasi warga, dan inovasi bank sampah di desa kami.</p>
        </div>

        @livewire('gallery-list')
    </main>

    <footer class="py-12 text-center text-slate-300 text-[10px] font-black uppercase tracking-widest">
        &copy; 2026 SIPESADE - Dokumentasi Program Desa
    </footer>

</body>
</html>