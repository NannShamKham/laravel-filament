<?php

namespace App\Filament\Resources\NewResource\Pages;

use App\Filament\Resources\NewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNew extends EditRecord
{
    protected static string $resource = NewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
