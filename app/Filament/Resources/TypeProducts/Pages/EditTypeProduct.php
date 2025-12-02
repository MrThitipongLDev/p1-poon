<?php

namespace App\Filament\Resources\TypeProducts\Pages;

use App\Filament\Resources\TypeProducts\TypeProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTypeProduct extends EditRecord
{
    protected static string $resource = TypeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
