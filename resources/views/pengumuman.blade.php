<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Informasi Desa - SIPESADE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans scroll-smooth">

    <!-- NAVBAR / HEADER -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Back Button & Title -->
                <div class="flex items-center gap-4">
                    <a href="/" class="p-2 bg-slate-100 hover:bg-emerald-50 rounded-full text-slate-500 hover:text-emerald-600 transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                    <div>
                        <h1 class="text-lg font-black tracking-tight text-slate-800 uppercase">Pusat Informasi</h1>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Update: {{ date('d M Y') }}</p>
                    </div>
                </div>

                <!-- Logo Brand -->
                <div class="flex items-center gap-2">
                    <span class="text-xl font-black text-emerald-600 tracking-tighter">SIPESADE</span>
                    <div class="p-1.5 bg-emerald-600 rounded-lg shadow-lg shadow-emerald-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-16">
        
        <!-- HERO SECTION PENGUMUMAN -->
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-1.5 mb-6 text-[10px] font-black tracking-[0.2em] text-emerald-700 uppercase bg-emerald-100 rounded-full">News & Updates</span>
            <h2 class="text-5xl md:text-6xl font-black text-slate-900 mb-6 tracking-tight">
                Pengumuman & <br><span class="text-emerald-600 italic">Update Layanan</span>
            </h2>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
                Dapatkan informasi terbaru mengenai jadwal operasional, kebijakan baru, dan kegiatan sosial pengelolaan sampah desa secara real-time.
            </p>
        </div>

        <!-- LIVEWIRE COMPONENT (Filter & Cards) -->
        <!-- Bagian ini sudah mencakup filter kategori dan list card yang kita buat tadi -->
        <div class="min-h-[400px]">
            @livewire('announcement-list')
        </div>

        <!-- CTA SECTION / WHATSAPP NOTIFICATION -->
        <div class="mt-32 relative overflow-hidden bg-slate-900 rounded-[3rem] p-12 md:p-20 text-center shadow-2xl">
            <!-- Dekorasi Blur -->
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <h3 class="text-3xl md:text-4xl font-black text-white mb-4">Langganan Info via WhatsApp?</h3>
                <p class="text-slate-400 mb-10 max-w-md mx-auto">Jangan lewatkan info penting! Dapatkan notifikasi pengumuman langsung di handphone Anda.</p>
                <button class="px-10 py-5 bg-emerald-500 hover:bg-emerald-400 text-white rounded-2xl font-black text-sm uppercase tracking-widest transition-all hover:scale-105 active:scale-95 shadow-xl shadow-emerald-900/40">
                    Aktifkan Notifikasi
                </button>
            </div>
        </div>

    </main>

    <footer class="py-16 text-center border-t border-slate-100">
        <p class="text-[10px] font-black text-slate-300 tracking-[0.3em]">
            &copy; 2026 SIPESADE - Sistem Informasi Pengelolaan Sampah Desa
        </p>
    </footer>

</body>
</html>