<?php

namespace App\Filament\User\Pages;

use App\Models\Trash;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class TrashSubmission extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $navigationLabel = 'Setor & Jemput Sampah';
    protected static ?string $title = 'Form Pengajuan Sampah';
    protected static string $view = 'filament.user.pages.trash-submission';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Sampah')
                    ->description('Lengkapi data sampah. Berat harus berupa angka.')
                    ->schema([
                        Select::make('jenis_sampah')
                            ->options([
                                'organik' => 'Organik',
                                'anorganik' => 'Anorganik',
                                'B3' => 'Limbah B3',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('berat')
                            ->numeric() // Validasi: Harus angka
                            ->required()
                            ->suffix('Kg'),
                        Toggle::make('butuh_jemput')
                            ->label('Saya butuh penjemputan ke rumah')
                            ->live() // Interaktif: alamat langsung muncul/hilang
                            ->columnSpanFull(),
                        Textarea::make('alamat')
                            ->label('Alamat Lengkap Penjemputan')
                            ->placeholder('Contoh: Jl. Merdeka No. 10, RT 02/05')
                            ->hidden(fn ($get) => ! $get('butuh_jemput')) 
                            ->required(fn ($get) => $get('butuh_jemput'))
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->extraAttributes(['class' => 'ring-1 ring-slate-200 shadow-xl rounded-[2.5rem]']),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $input = $this->form->getState();

        $status = $input['butuh_jemput'] ? 'Pending' : 'Selesai';

        Trash::create([
            'user_id' => auth()->id(),
            'jenis_sampah' => $input['jenis_sampah'],
            'berat' => $input['berat'],
            'status' => $status,
            'keterangan' => $input['butuh_jemput'] 
                ? $input['alamat'] 
                : 'Setor Mandiri',
        ]);

        Notification::make()
            ->title('Berhasil Dikirim!')
            ->success()
            ->send();

        $this->form->fill();
    }
}