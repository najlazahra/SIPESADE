<?php

namespace App\Filament\Widgets;

use App\Models\Trash;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TrashChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Sampah Masuk Seminggu Terakhir';
    
    // Membuat widget memenuhi lebar layar agar tidak terlihat "tipis"
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Mengambil tren jumlah berat sampah harian
        $data = Trend::model(Trash::class)
            ->between(
                start: now()->startOfWeek(),
                end: now()->endOfWeek(),
            )
            ->perDay()
            ->sum('berat');

        return [
            'datasets' => [
                [
                    'label' => 'Total Sampah (Kg)',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill' => 'start',
                    'borderColor' => '#10b981', // Warna Emerald
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.3, // Membuat garis sedikit melengkung agar estetik
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}