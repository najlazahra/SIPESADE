<?php

namespace App\Filament\User\Widgets;

use App\Models\Trash;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Interval update data otomatis tiap 15 detik agar terasa hidup
    protected static ?string $pollingInterval = '15s'; 

    protected function getStats(): array
    {
        return [
            Stat::make('Total Sampah Disetor', Trash::where('user_id', auth()->id())->sum('berat') . ' Kg')
                ->description('Kontribusi kebersihan Anda')
                ->descriptionIcon('heroicon-m-trash')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->extraAttributes([
                    'class' => 'ring-1 ring-slate-200 hover:ring-emerald-500 hover:shadow-lg transition duration-300 cursor-pointer rounded-xl',
                    // Menambahkan border tipis (ring-1) dan efek hover warna emerald
                ]),

            Stat::make('Status Penjemputan', Trash::where('user_id', auth()->id())->where('status', 'Pending')->count())
                ->description('Menunggu petugas datang')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([1, 5, 2, 8, 4, 11])
                ->color('warning')
                ->extraAttributes([
                    'class' => 'ring-1 ring-slate-200 hover:ring-amber-500 hover:shadow-lg transition duration-300 cursor-pointer rounded-xl',
                ]),

            Stat::make('Berhasil Diangkut', Trash::where('user_id', auth()->id())->where('status', 'Selesai')->count())
                ->description('Sampah sudah selesai diproses')
                ->descriptionIcon('heroicon-m-check-badge')
                ->chart([3, 10, 5, 12, 8, 15])
                ->color('emerald')
                ->extraAttributes([
                    'class' => 'ring-1 ring-slate-200 hover:ring-emerald-600 hover:shadow-lg transition duration-300 cursor-pointer rounded-xl',
                ]),
        ];
    }
}