<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach(\App\Models\Documentation::latest()->get() as $doc)
    <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
        <!-- Image Container -->
        <div class="h-64 overflow-hidden relative">
            <img src="{{ asset('storage/' . $doc->image) }}" alt="{{ $doc->title }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </div>

        <!-- Info Section -->
        <div class="p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="px-4 py-1 rounded-full text-[10px] font-black tracking-widest uppercase
                    {{ $doc->category === 'KEGIATAN' ? 'bg-emerald-100 text-emerald-600' : ($doc->category === 'EDUKASI' ? 'bg-amber-100 text-amber-600' : 'bg-blue-100 text-blue-600') }}">
                    {{ $doc->category }}
                </span>
                <span class="text-xs font-bold text-slate-400">{{ \Carbon\Carbon::parse($doc->event_date)->format('d F Y') }}</span>
            </div>
            <h3 class="text-2xl font-black text-slate-800 leading-tight group-hover:text-emerald-600 transition-colors">
                {{ $doc->title }}
            </h3>
        </div>
    </div>
    @endforeach
</div>