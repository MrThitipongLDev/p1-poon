<?php

namespace App\Filament\Resources\TypeProducts;

use App\Filament\Resources\TypeProducts\Pages\CreateTypeProduct;
use App\Filament\Resources\TypeProducts\Pages\EditTypeProduct;
use App\Filament\Resources\TypeProducts\Pages\ListTypeProducts;
use App\Filament\Resources\TypeProducts\Schemas\TypeProductForm;
use App\Filament\Resources\TypeProducts\Tables\TypeProductsTable;
use App\Models\TypeProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TypeProductResource extends Resource
{
    protected static ?string $model = TypeProduct::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TypeProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeProductsTable::configure($table);
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
            'index' => ListTypeProducts::route('/'),
            'create' => CreateTypeProduct::route('/create'),
            'edit' => EditTypeProduct::route('/{record}/edit'),
        ];
    }
}
