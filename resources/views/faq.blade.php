<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan & Lokasi - SIPESADE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans scroll-smooth">

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="/" class="p-2 bg-slate-100 hover:bg-emerald-50 rounded-full text-slate-500 hover:text-emerald-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-black text-slate-800 tracking-tight">PUSAT BANTUAN</h1>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid lg:grid-cols-2 gap-16">
            
            <!-- SISI KIRI: FAQ & WHATSAPP -->
            <div class="space-y-12">
                <div>
                    <h2 class="text-4xl font-black text-slate-900 mb-4 leading-tight">Butuh <span class="text-emerald-600 italic">Bantuan Cepat?</span></h2>
                    <p class="text-slate-500 mb-10">Berikut adalah jawaban untuk kendala yang paling sering ditanyakan warga.</p>

                    <!-- ACCORDION FAQ -->
                    <div class="space-y-4" x-data="{ active: 1 }">
                        <!-- FAQ 1 -->
                        <div class="border border-slate-200 rounded-3xl bg-white overflow-hidden">
                            <button @click="active = (active === 1 ? null : 1)" class="w-full p-6 text-left flex justify-between items-center">
                                <span class="font-bold text-slate-700">Kapan sampah saya dijemput?</span>
                                <svg class="w-5 h-5 transition-transform" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="active === 1" x-collapse class="px-6 pb-6 text-sm text-slate-500 leading-relaxed">
                                Penjemputan dilakukan sesuai jadwal wilayah RT Anda. Silakan cek menu **Jadwal Pengangkutan** di halaman depan untuk detail harinya.
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="border border-slate-200 rounded-3xl bg-white overflow-hidden">
                            <button @click="active = (active === 2 ? null : 2)" class="w-full p-6 text-left flex justify-between items-center">
                                <span class="font-bold text-slate-700">Apa itu ID Penjemputan?</span>
                                <svg class="w-5 h-5 transition-transform" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="active === 2" x-collapse class="px-6 pb-6 text-sm text-slate-500 leading-relaxed">
                                ID Penjemputan adalah nomor unik yang didapat setelah warga mengajukan setoran sampah. Gunakan nomor ini di fitur **Cek Status** untuk memantau petugas.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TOMBOL WHATSAPP CS -->
                <div class="p-8 bg-emerald-50 rounded-[2.5rem] border border-emerald-100 relative overflow-hidden">
                    <h3 class="text-xl font-black text-emerald-800 mb-2">Masih Ada Kendala?</h3>
                    <p class="text-emerald-700/70 text-sm mb-6 leading-relaxed">Hubungi Customer Service kami melalui WhatsApp untuk respon lebih cepat.</p>
                    <!-- Ganti nomor di bawah ini dengan nomor WA aslimu -->
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20SIPESADE,%20saya%20ingin%20bertanya..." 
                       target="_blank"
                       class="inline-flex items-center gap-3 px-8 py-4 bg-emerald-600 text-white rounded-2xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        Chat via WhatsApp
                    </a>
                </div>
            </div>

            <!-- SISI KANAN: LOKASI (MAPS) -->
            <div>
                <div class="bg-slate-900 rounded-[3rem] p-4 shadow-2xl overflow-hidden h-full flex flex-col">
                    <div class="p-8">
                        <h3 class="text-2xl font-black text-white mb-2">Lokasi TPS Utama</h3>
                        <p class="text-slate-400 text-xs mb-6 uppercase tracking-widest font-bold">Jl. Kebersihan No. 12, Desa Makmur</p>
                    </div>
                    
                    <!-- Embed Google Maps (TPS) -->
                    <div class="flex-grow rounded-[2.5rem] overflow-hidden border-4 border-slate-800">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731164!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x3565f949666d9361!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1714800000000!5m2!1sen!2sid" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-4 text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-sm font-bold">Jam Operasional: 07:00 - 16:00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-12 text-center text-slate-300 text-[10px] font-black uppercase tracking-widest">
        &copy; 2026 SIPESADE - Sistem Informasi Pengelolaan Sampah Desa
    </footer>

</body>
</html>