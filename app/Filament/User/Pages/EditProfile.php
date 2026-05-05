<?php

namespace App\Filament\User\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Notifications\Notification; // Tambahkan import ini untuk Notifikasi

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pribadi')
                    ->description('Perbarui data diri dan kontak Anda untuk memudahkan komunikasi dengan petugas.')
                    ->schema([
                        $this->getNameFormComponent()
                            ->label('Nama Lengkap'),
                        $this->getEmailFormComponent()
                            ->label('Alamat Email'),
                        
                        TextInput::make('phone')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->placeholder('Contoh: 081234567890'),
                            
                        Textarea::make('address')
                            ->label('Alamat Rumah Lengkap (RT/RW)')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Masukkan alamat lengkap untuk memudahkan penjemputan...'),
                    ])->columns(2),

                Section::make('Keamanan Akun')
                    ->description('Masukkan password saat ini jika Anda ingin mengubah password baru.')
                    ->schema([
                        // Tambahan: Input Password Saat Ini
                        TextInput::make('current_password')
                            ->label('Password Saat Ini')
                            ->password()
                            ->revealable()
                            ->currentPassword() // Otomatis mengecek kebenaran password lama di database
                            ->requiredWith('password') // Wajib diisi HANYA JIKA kolom password baru diisi
                            ->dehydrated(false) // Jangan simpan kolom ini langsung ke database
                            ->columnSpanFull(),

                        $this->getPasswordFormComponent()
                            ->label('Password Baru'),
                        $this->getPasswordConfirmationFormComponent()
                            ->label('Konfirmasi Password Baru'),
                    ])->columns(2),
            ]);
    }

    // Kustomisasi Notifikasi Berhasil
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil Diperbarui! 🎉')
            ->body('Profil dan keamanan akun Anda telah sukses disimpan.')
            ->duration(3000); // Notifikasi akan hilang otomatis dalam 3 detik
    }
}   