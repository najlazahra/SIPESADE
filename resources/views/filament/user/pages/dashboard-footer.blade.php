<div class="mt-8">
    <h3 class="text-lg font-bold text-slate-800 mb-4">Status Notifikasi Penjemputan</h3>
    
    <div class="p-6 bg-white border ring-1 ring-slate-200 rounded-[2rem] shadow-sm hover:shadow-md transition duration-300">
        <div class="flex items-center gap-6">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl 
                {{ $status === 'Selesai' ? 'bg-emerald-100' : ($status === 'Diproses' ? 'bg-amber-100' : 'bg-rose-100') }}">
                {{ $status === 'Selesai' ? '✅' : ($status === 'Diproses' ? '🚚' : '⏳') }}
            </div>
            
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Update Terakhir: {{ $tanggal }}</p>
                        <h4 class="text-xl font-extrabold text-slate-800 mt-1">Sampah {{ ucfirst($jenis) }} Anda</h4>
                    </div>
                    <span class="px-4 py-1 rounded-full text-xs font-bold uppercase
                        {{ $status === 'Selesai' ? 'bg-emerald-600 text-white' : ($status === 'Diproses' ? 'bg-amber-500 text-white' : 'bg-rose-600 text-white') }}">
                        {{ $status }}
                    </span>
                </div>
                <p class="text-slate-500 mt-2 text-sm italic">
                    {{ $status === 'Pending' ? 'Mohon tunggu, petugas akan segera menjadwalkan penjemputan.' : '' }}
                    {{ $status === 'Diproses' ? 'Petugas sedang dalam perjalanan menuju lokasi Anda.' : '' }}
                    {{ $status === 'Selesai' ? 'Sampah telah berhasil diangkut dan diproses di TPS Desa.' : '' }}
                </p>
            </div>
        </div>
    </div>
</div>

