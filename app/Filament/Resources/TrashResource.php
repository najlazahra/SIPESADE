<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrashResource\Pages;
use App\Models\Trash;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkAction;
use Filament\Notifications\Notification; // Tambahin ini biar ada notif sukses
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class TrashResource extends Resource
{
    protected static ?string $model = Trash::class;
    protected static ?string $navigationIcon = 'heroicon-o-trash';
    protected static ?string $navigationLabel = 'Manajemen Sampah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Data Sampah') // Pake Section biar tegas
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('Nama Warga')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('jenis_sampah')
                            ->options([
                                'organik' => 'Organik',
                                'anorganik' => 'Anorganik',
                                'B3' => 'Limbah B3',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('berat')
                            ->label('Berat (Kg)')
                            ->numeric()
                            ->required()
                            ->suffix('Kg'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'Pending' => 'Pending',
                                'Diproses' => 'Diproses',
                                'Selesai' => 'Selesai',
                            ])
                            ->default('Pending')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Warga')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_sampah')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'organik' => 'success',
                        'anorganik' => 'info',
                        'B3' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat')
                    ->suffix(' Kg')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Selesai' => 'success',
                        'Diproses' => 'warning',
                        'Pending' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->actions([
                // FITUR VERIFIKASI CEPAT (MODUL 3)
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('proses')
                        ->label('Set Diproses')
                        ->icon('heroicon-m-truck')
                        ->color('warning')
                        ->hidden(fn (Trash $record) => $record->status !== 'Pending')
                        ->action(function (Trash $record) {
                            $record->update(['status' => 'Diproses']);
                            Notification::make()->title('Status: Sedang Diproses')->warning()->send();
                        }),
                    Tables\Actions\Action::make('selesai')
                        ->label('Set Selesai')
                        ->icon('heroicon-m-check-badge')
                        ->color('success')
                        ->hidden(fn (Trash $record) => $record->status === 'Selesai')
                        ->action(function (Trash $record) {
                            $record->update(['status' => 'Selesai']);
                            Notification::make()->title('Status: Berhasil Diselesaikan')->success()->send();
                        }),
                ]),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    // FITUR EXPORT KE EXCEL/CSV (ORANG 5)
                    BulkAction::make('export')
                        ->label('Export ke Excel')
                        ->icon('heroicon-o-document-arrow-down')
                        ->color('success')
                        ->action(function (Collection $records) {
                            $csvFileName = 'laporan-sampah-' . now()->format('Y-m-d') . '.csv';
                            $headers = [
                                "Content-type" => "text/csv",
                                "Content-Disposition" => "attachment; filename=$csvFileName",
                            ];
                            $callback = function() use ($records) {
                                $file = fopen('php://output', 'w');
                                fputcsv($file, ['Warga', 'Jenis', 'Berat', 'Status', 'Tanggal']);
                                foreach ($records as $record) {
                                    fputcsv($file, [$record->user->name, $record->jenis_sampah, $record->berat, $record->status, $record->created_at]);
                                }
                                fclose($file);
                            };
                            return response()->stream($callback, 200, $headers);
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrashes::route('/'),
            'create' => Pages\CreateTrash::route('/create'),
            'edit' => Pages\EditTrash::route('/{record}/edit'),
        ];
    }
}