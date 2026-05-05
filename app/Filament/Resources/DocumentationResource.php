<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentationResource\Pages;
use App\Filament\Resources\DocumentationResource\RelationManagers;
use App\Models\Documentation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentationResource extends Resource
{
    protected static ?string $model = Documentation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Section::make('Upload Dokumentasi')
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Kegiatan')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->options([
                        'KEGIATAN' => 'Kegiatan',
                        'EDUKASI' => 'Edukasi',
                        'INOVASI' => 'Inovasi',
                    ])->required(),
                Forms\Components\DatePicker::make('event_date')
                    ->label('Tanggal Kegiatan')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto Kegiatan')
                    ->image()
                    ->directory('dokumentasi') // Simpan di storage/app/public/dokumentasi
                    ->imageEditor() // Biar admin bisa nge-crop foto
                    ->required()
                    ->columnSpanFull(),
            ])->columns(3),
    ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocumentations::route('/'),
            'create' => Pages\CreateDocumentation::route('/create'),
            'edit' => Pages\EditDocumentation::route('/{record}/edit'),
        ];
    }
}
