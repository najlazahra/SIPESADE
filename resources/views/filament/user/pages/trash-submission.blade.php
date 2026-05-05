<x-filament-panels::page>
    <form wire:submit="create">
        {{ $this->form }}

        <div class="mt-8">
            <x-filament::button type="submit" size="xl" class="w-full rounded-3xl bg-emerald-600 shadow-2xl shadow-emerald-100 py-4 text-lg">
                KIRIM SEKARANG
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>