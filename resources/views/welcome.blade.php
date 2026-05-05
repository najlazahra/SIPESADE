<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-PENGELOLAAN SAMPAH DESA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans scroll-smooth">

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-emerald-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-emerald-600">SIPESADE</span>
                </div>
                <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="/" class="hover:text-emerald-600 transition">Beranda</a>
                <a href="/pengumuman" class="hover:text-emerald-600 transition">Pengumuman</a>
                <a href="/dokumentasi" class="hover:text-emerald-600 transition">Dokumentasi</a>
                <a href="/faq" class="hover:text-emerald-600 transition">FAQ & Kontak</a>
                </div>
                <!-- Tombol Tunggal di Landing Page -->
<a href="/admin/login" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:bg-emerald-700 transition">
    Login Admin
</a>
            </div>
        </div>
    </nav>

<!-- 1. HERO SECTION (Beranda) -->
    <section id="beranda" class="relative overflow-hidden bg-white pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Sisi Kiri: Teks & Action -->
                <div class="text-left animate-fade-in">
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-semibold tracking-widest text-emerald-700 uppercase bg-emerald-100 rounded-full">Solusi Kebersihan Desa</span>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">
                        Wujudkan Desa Bersih <br><span class="text-emerald-600">Mulai Dari Rumah</span>
                    </h1>
                    <p class="text-lg text-slate-500 max-w-xl mb-10 leading-relaxed">
                        Sistem digital SIPESADE memudahkan warga mengelola sampah keluarga. Setor mandiri atau panggil petugas jemput langsung ke depan pintu rumah Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/user/register" class="px-8 py-4 bg-emerald-600 text-white rounded-2xl font-bold text-lg hover:scale-105 transition-transform shadow-xl shadow-emerald-200 text-center">
                            Daftar/Masuk Jadi Warga
                        </a>
                        <a href="#jadwal" class="px-8 py-4 bg-white border-2 border-slate-200 text-slate-700 rounded-2xl font-bold text-lg hover:bg-slate-50 transition text-center">
                            Cek Jadwal Rutin
                        </a>
                    </div>
                </div>

                <!-- Sisi Kanan: Gambar Hero -->
                <div class="relative group">
                    <!-- Elemen Dekoratif di belakang gambar -->
                    <div class="absolute -inset-4 bg-emerald-100 rounded-[3rem] rotate-3 transition-transform group-hover:rotate-6 duration-500"></div>
                    <div class="absolute -inset-4 bg-slate-100 rounded-[3rem] -rotate-3 transition-transform group-hover:-rotate-1 duration-500"></div>
                    
                    <!-- Gambar Hero Utama -->
                    <div class="relative rounded-[2.5rem] overflow-hidden border-4 border-white shadow-2xl">
                        <img src="{{ asset('images/hero.jpg') }}" 
                             alt="Pengelolaan Sampah Desa" 
                             class="w-full h-[450px] object-cover transform transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Floating Card di atas gambar -->
                        <div class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-sm p-5 rounded-2xl border border-white/20 shadow-lg animate-bounce-slow">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-emerald-500 rounded-xl text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Status Terkini</p>
                                    <p class="text-sm font-black text-slate-800">Desa Bersih & Asri Hari Ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- 2. INFORMASI & EDUKASI SAMPAH -->
    <section id="edukasi" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-slate-900">Kenali Sampahmu</h2>
                <p class="text-slate-500">Pilah sampah dari rumah untuk lingkungan yang lebih sehat.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Organik -->
                <div class="group bg-white rounded-3xl shadow-sm border border-slate-100 hover:border-emerald-500 transition-all duration-300 overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/organik.jpg') }}" alt="Sampah Organik" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-8">
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6 font-bold">1</div>
                        <h3 class="text-xl font-bold mb-3 text-emerald-700">Sampah Organik</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Sampah sisa makanan dan daun yang mudah membusuk. Bisa diolah menjadi kompos berkualitas tinggi.</p>
                        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full uppercase tracking-wider">Contoh: Sisa Nasi, Kulit Buah</span>
                    </div>
                </div>

                <!-- Anorganik -->
                <div class="group bg-white rounded-3xl shadow-sm border border-slate-100 hover:border-amber-500 transition-all duration-300 overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/anorganik.jpg') }}" alt="Sampah Anorganik" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-8">
                        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6 font-bold">2</div>
                        <h3 class="text-xl font-bold mb-3 text-amber-700">Sampah Anorganik</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Sampah yang sulit terurai secara alami. Dapat didaur ulang menjadi barang bernilai ekonomis.</p>
                        <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full uppercase tracking-wider">Contoh: Plastik, Kaleng, Kaca</span>
                    </div>
                </div>

                <!-- B3 -->
                <div class="group bg-white rounded-3xl shadow-sm border border-slate-100 hover:border-rose-500 transition-all duration-300 overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/b3.jpg') }}" alt="Sampah B3" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-8">
                        <div class="w-10 h-10 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center mb-6 font-bold">3</div>
                        <h3 class="text-xl font-bold mb-3 text-rose-700">Sampah B3</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">Bahan Berbahaya dan Beracun yang memerlukan penanganan khusus oleh petugas profesional.</p>
                        <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-3 py-1 rounded-full uppercase tracking-wider">Contoh: Baterai, Lampu, Aki</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<section id="jadwal" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-slate-900 mb-4">Jadwal Operasional</h2>
            <p class="text-slate-500">Informasi rutin pengangkutan sampah di wilayah Desa.</p>
        </div>
        
        <div class="overflow-hidden rounded-[2.5rem] border border-slate-100 shadow-2xl shadow-slate-200">
            <table class="w-full text-left">
                <thead class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white">
                    <tr>
                        <th class="p-6 font-bold uppercase tracking-widest text-xs">Wilayah / RT</th>
                        <th class="p-6 font-bold uppercase tracking-widest text-xs text-center">Hari Pengangkutan</th>
                        <th class="p-6 font-bold uppercase tracking-widest text-xs text-right">Jam Operasional</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach(\App\Models\Schedule::all() as $item)
                    <tr class="group hover:bg-emerald-50 transition-colors">
                        <td class="p-6">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-8 bg-emerald-500 rounded-full scale-y-0 group-hover:scale-y-100 transition-transform"></div>
                                <span class="font-black text-slate-700">{{ $item->wilayah }}</span>
                            </div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="px-4 py-1.5 bg-slate-100 text-slate-600 rounded-full text-sm font-semibold group-hover:bg-white group-hover:text-emerald-600 transition-colors">
                                {{ $item->hari }}
                            </span>
                        </td>
                        <td class="p-6 text-right font-mono font-bold text-emerald-600">
                            {{ $item->jam }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

    <!-- 4. CEK STATUS PENJEMPUTAN (Fitur Publik Tanpa Login) -->
    <section id="cek-status" class="py-32 bg-emerald-900 text-white overflow-hidden relative">
    <!-- Dekorasi Background -->
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-64 h-64 bg-teal-500/20 rounded-full blur-3xl"></div>
    
    @livewire('track-trash')
</section>

    <footer class="py-12 border-t border-slate-200 text-center text-slate-500 text-sm">
        <p>&copy; 2026 Sistem Informasi-Pengelolaan Sampah Desa.</p>
    </footer>

</body>
</html>