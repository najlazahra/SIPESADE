<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\TrashResource\Pages;
use App\Models\Trash;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TrashResource extends Resource
{
    protected static ?string $model = Trash::class;

    // Mengganti ikon agar lebih relevan dengan sampah
    protected static ?string $navigationIcon = 'heroicon-o-trash';

    protected static ?string $navigationLabel = 'Riwayat Setor Sampah';
    protected static ?string $slug = 'riwayat-sampah';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Form Setoran Sampah')
                    ->description('Silakan isi detail sampah yang akan disetorkan atau dijemput.')
                    ->schema([
                        // Otomatis mengambil ID warga yang login
                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id()),

                        Forms\Components\Select::make('jenis_sampah')
                            ->options([
                                'organik' => 'Organik (Sisa Makanan/Daun)',
                                'anorganik' => 'Anorganik (Plastik/Logam/Kaca)',
                                'B3' => 'Limbah B3 (Baterai/Lampu/Oli)',
                            ])
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('berat')
                            ->label('Perkiraan Berat (Kg)')
                            ->numeric()
                            ->minValue(0.1)
                            ->required()
                            ->placeholder('Contoh: 1.5')
                            ->suffix('Kg'),

                        // Status otomatis Pending, tidak bisa diubah oleh warga
                        Forms\Components\Hidden::make('status')
                            ->default('Pending'),
                    ])
                    ->columns(2)
                    // Menambahkan border tegas pada form agar tidak terlihat tipis
                    ->extraAttributes(['class' => 'ring-1 ring-slate-200 shadow-sm']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_sampah')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'organik' => 'success',
                        'anorganik' => 'info',
                        'B3' => 'danger',
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat')
                    ->suffix(' Kg')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Selesai' => 'success',   // Emerald
                        'Diproses' => 'warning',  // Amber
                        'Pending' => 'danger',    // Rose
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Setor')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('gray'),
            ])
            // Baris tabel dengan hover effect
            ->striped()
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->actions([
                // Warga hanya boleh edit jika status masih Pending
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => in_array($record->status, ['Pending', 'Selesai']))
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn (Trash $record) => $record->status === 'Pending'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrashes::route('/'),
            'create' => Pages\CreateTrash::route('/create'),
            'edit' => Pages\EditTrash::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        // Keamanan: Warga hanya bisa melihat datanya sendiri
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}