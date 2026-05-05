<?php

namespace App\Filament\User\Pages;

use App\Models\Trash;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\View\View;

class Dashboard extends BaseDashboard
{

    public function getHeaderWidgets(): array
    {
        return [
            // Memanggil widget statistik yang sudah kita buat sebelumnya
            \App\Filament\User\Widgets\StatsOverview::class,
        ];
    }

    // Menambahkan Konten Notifikasi Tepat di Bawah Statistik
    public function getFooter(): View
    {
        // Mengambil data sampah terakhir yang statusnya belum selesai
        $latestStatus = Trash::where('user_id', auth()->id())
            ->latest()
            ->first();

        return view('filament.user.pages.dashboard-footer', [
            'status' => $latestStatus?->status ?? 'Belum ada aktivitas',
            'jenis' => $latestStatus?->jenis_sampah ?? '-',
            'tanggal' => $latestStatus?->created_at?->format('d M Y') ?? '-'
        ]);
    }
}