<?php

namespace App\Filament\Resources\TypeProducts\Pages;

use App\Filament\Resources\TypeProducts\TypeProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTypeProducts extends ListRecords
{
    protected static string $resource = TypeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
