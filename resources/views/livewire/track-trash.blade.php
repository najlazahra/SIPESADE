<div class="max-w-3xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-black mb-6">Cek Status Penjemputan</h2>
    <p class="text-emerald-100 mb-10 text-lg opacity-80">Masukkan ID Anda untuk melihat progres petugas secara real-time.</p>
    
    <div class="relative max-w-md mx-auto mb-12">
        <input wire:model="search" type="text" placeholder="Masukkan ID (Contoh: 1)" 
               class="w-full px-8 py-5 rounded-3xl bg-white/10 border-2 border-emerald-500/30 text-white placeholder:text-emerald-300 focus:outline-none focus:border-emerald-400 focus:ring-4 focus:ring-emerald-500/20 transition-all text-xl font-bold">
        
        <button wire:click="checkStatus" class="w-full mt-4 bg-emerald-500 hover:bg-emerald-400 text-white font-black py-5 rounded-3xl transition-all shadow-2xl shadow-emerald-900/50 hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
            Cek Sekarang
        </button>
    </div>

    <!-- Loading State -->
    <div wire:loading class="text-emerald-300 animate-pulse font-bold mb-4">
        Sedang mencari data...
    </div>

    <!-- Error Message -->
    @if (session()->has('error'))
        <div class="p-6 bg-rose-500/20 border border-rose-500/50 rounded-3xl text-rose-200 font-bold animate-shake">
            {{ session('error') }}
        </div>
    @endif

    <!-- Result Box -->
    @if($result)
    <div class="mt-8 p-8 bg-white rounded-[2.5rem] shadow-2xl text-slate-800 text-left border-t-8 border-emerald-500 animate-fade-in-up">
        <div class="flex justify-between items-start mb-6">
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">ID Penjemputan</p>
                <h3 class="text-2xl font-black text-emerald-600">#{{ $result->id }}</h3>
            </div>
            <span class="px-6 py-2 rounded-full text-xs font-black uppercase tracking-tighter
                {{ $result->status === 'Selesai' ? 'bg-emerald-100 text-emerald-700' : ($result->status === 'Diproses' ? 'bg-amber-100 text-amber-700' : 'bg-rose-100 text-rose-700') }}">
                ● {{ $result->status }}
            </span>
        </div>
        
        <div class="grid grid-cols-2 gap-6 border-t border-slate-100 pt-6">
            <div>
                <p class="text-xs font-bold text-slate-400">Jenis Sampah</p>
                <p class="font-bold text-slate-700 uppercase">{{ $result->jenis_sampah }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400">Berat Estimasi</p>
                <p class="font-bold text-slate-700">{{ $result->berat }} Kg</p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-bold text-slate-400">Alamat/Keterangan</p>
                <p class="font-medium text-slate-600 leading-relaxed">{{ $result->keterangan }}</p>
            </div>
        </div>
    </div>
    @endif
</div>