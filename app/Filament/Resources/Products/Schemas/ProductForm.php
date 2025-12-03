<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('typeId')
                    ->label('ประเภทสินค้า')
                    ->relationship('typeProduct', 'name') // ดึงข้อมูลจาก method typeProduct ใน Model Product และแสดง field 'name'
                    ->searchable() // ให้พิมพ์ค้นหาได้
                    ->preload()    // โหลดข้อมูลมาเตรียมไว้เลย (เหมาะกับข้อมูลไม่เยอะมาก)
                    ->required(),
                DatePicker::make('EXP')
                    ->label('วันหมดอายุ')
                    ->required(),
                TextInput::make('qty')
                    ->label('จำนวน')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
