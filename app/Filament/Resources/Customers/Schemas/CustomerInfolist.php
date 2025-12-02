<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextEntry::make('name')->label('ชื่อ'),
                TextEntry::make('phone')->label('เบอร์โทร')
            ]);
    }
}
