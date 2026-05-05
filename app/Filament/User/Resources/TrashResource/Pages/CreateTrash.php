<?php

namespace App\Filament\User\Resources\TrashResource\Pages;

use App\Filament\User\Resources\TrashResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrash extends CreateRecord
{
    protected static string $resource = TrashResource::class;
}
