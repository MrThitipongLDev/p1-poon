<?php

namespace App\Filament\Resources\TypeProducts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TypeProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->label('ชื่อประเภทสินค้า')
                    ->required(),
            ]);
    }
}
