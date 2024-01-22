<?php

namespace App\Filament\Resources\NewResource\Pages;

use App\Filament\Resources\NewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNew extends CreateRecord
{
    protected static string $resource = NewResource::class;
}
