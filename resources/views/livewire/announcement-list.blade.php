<div>
    <!-- Tombol Filter (Gaya Minimalis) -->
    <div class="flex flex-wrap gap-3 mb-16 justify-center">
        @foreach(['Semua', 'Jadwal', 'Kegiatan', 'Libur'] as $cat)
            <button wire:click="setCategory('{{ $cat }}')" 
                class="px-8 py-3 rounded-2xl font-bold transition-all duration-300 {{ $category === $cat ? 'bg-emerald-600 text-white shadow-xl shadow-emerald-200' : 'bg-white text-slate-500 border border-slate-200 hover:border-emerald-500 hover:text-emerald-600' }}">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Container Card (Grid Layout) -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        @forelse($announcements as $info)
        <div class="group relative bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-emerald-500/30 transition-all duration-500 flex flex-col justify-between animate-fade-in-up">
            
            <div>
                <!-- Header Card -->
                <div class="flex justify-between items-start mb-6">
                    <span class="text-[10px] font-black text-emerald-600 bg-emerald-50 px-4 py-1.5 rounded-full uppercase tracking-widest">
                        {{ $info->category }}
                    </span>
                    @if($info->is_important)
                        <span class="text-[10px] font-black bg-rose-100 text-rose-600 px-4 py-1.5 rounded-full uppercase tracking-tighter animate-pulse">
                            Penting
                        </span>
                    @endif
                </div>

                <!-- Konten -->
                <h3 class="text-2xl font-black text-slate-800 mb-4 group-hover:text-emerald-700 transition-colors">
                    {{ $info->title }}
                </h3>
                <p class="text-slate-500 leading-relaxed text-sm line-clamp-4">
                    {{ $info->content }}
                </p>
            </div>

            <!-- Footer Card -->
            <div class="mt-8 pt-6 border-t border-slate-50 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                    <span class="text-xs font-bold text-slate-400">{{ $info->created_at->format('d M Y') }}</span>
                </div>
                <button class="text-emerald-600 font-black text-xs uppercase tracking-widest hover:underline">
                    Detail
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center">
            <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 00-2 2H6a2 2 0 00-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <p class="text-slate-500 font-bold">Belum ada pengumuman di kategori ini.</p>
        </div>
        @endforelse
    </div>
</div>