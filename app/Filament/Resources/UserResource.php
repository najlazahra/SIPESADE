<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // Mengganti ikon agar lebih relevan dengan manajemen pengguna
    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Manajemen Warga';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            \Filament\Forms\Components\Section::make('Informasi Pribadi')
                ->description('Kelola data profil dan kontak warga.')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),
                        
                    \Filament\Forms\Components\TextInput::make('email')
                        ->label('Alamat Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                        
                    \Filament\Forms\Components\TextInput::make('phone')
                        ->label('Nomor WhatsApp')
                        ->tel()
                        ->maxLength(15)
                        ->placeholder('Contoh: 081234567890'),
                        
                    \Filament\Forms\Components\Textarea::make('address')
                        ->label('Alamat Rumah Lengkap (RT/RW)')
                        ->rows(3)
                        ->columnSpanFull()
                        ->placeholder('Masukkan alamat lengkap warga...'),
                ])->columns(2),

            \Filament\Forms\Components\Section::make('Keamanan Akun')
                ->description('Isi hanya jika Anda ingin mengubah atau mereset password warga ini.')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('password')
                        ->label('Password Baru')
                        ->password()
                        ->revealable()
                        ->maxLength(255)
                        // Wajib diisi saat bikin user baru, tapi opsional saat edit
                        ->required(fn (string $context): bool => $context === 'create') 
                        // Hash password secara otomatis sebelum masuk database
                        ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state))
                        // Hanya simpan ke database JIKA kolom ini diisi (tidak kosong)
                        ->dehydrated(fn ($state) => filled($state))
                        ->columnSpanFull(),
                ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Warga')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'), // Biar tegas kelihatannya
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->copyable() // Memudahkan admin copy email warga
                    ->icon('heroicon-m-envelope'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terdaftar Pada')
                    ->date('d M Y')
                    ->sortable()
                    ->color('gray'),
            ])
            ->filters([
                // Filter pendaftaran warga agar admin bisa monitoring (Tugas Orang 5)
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('registered_from')
                            ->label('Daftar Dari'),
                        Forms\Components\DatePicker::make('registered_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['registered_from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['registered_until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}