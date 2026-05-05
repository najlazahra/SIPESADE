<?php

namespace App\Filament\Widgets;

use App\Models\Trash;
use App\Models\User;
use App\Models\Announcement;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Sampah Masuk', Trash::sum('berat') . ' Kg')
                ->description('Total akumulasi setoran')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Warga Terdaftar', User::where('role', 'user')->count() . ' Orang')
                ->description('Warga aktif di sistem')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Pengumuman Aktif', Announcement::count())
                ->description('Info di landing page')
                ->descriptionIcon('heroicon-m-megaphone')
                ->color('warning'),
        ];
    }
}