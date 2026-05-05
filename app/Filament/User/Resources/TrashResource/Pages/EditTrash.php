<?php

namespace App\Filament\User\Resources\TrashResource\Pages;

use App\Filament\User\Resources\TrashResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrash extends EditRecord
{
    protected static string $resource = TrashResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
