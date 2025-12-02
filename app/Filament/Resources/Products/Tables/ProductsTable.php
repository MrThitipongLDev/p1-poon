<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Carbon\Carbon;


class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('ชื่อสินค้า')
                    ->searchable(),
                TextColumn::make('typeProduct.name')
                    ->label('ประเภทสินค้า')
                    ->sortable(),
                TextColumn::make('EXP')
                    ->label('EXP ว/ด/ป')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('qty')
                    ->label('จำนวน')
                    ->numeric()
                    ->sortable(),

                    //วันหมดอายุ
                    TextColumn::make('remaining_days')
                    ->label('สถานะวันหมดอายุ')
                    ->state(function ($record) {
                        if (! $record->EXP) return '-';

                        $exp = Carbon::parse($record->EXP)->endOfDay();
                        $now = Carbon::now();

                        // คำนวณความต่างเป็นวัน (false คือยอมให้ค่าติดลบได้ ถ้าเป็นอดีต)
                        $days = $now->diffInDays($exp, false);

                        if ($days < 0) {
                            return 'หมดอายุแล้ว ' . number_format(abs($days)) . ' วัน';
                        } elseif ($days == 0) {
                            return 'หมดอายุวันนี้';
                        } else {
                            return 'เหลือ ' . number_format($days) . ' วัน';
                        }
                    })
                    ->badge() // ทำเป็นป้ายสีสวยๆ
                    ->color(fn (string $state): string => match (true) {
                        str_contains($state, 'หมดอายุ') => 'danger', // สีแดง
                        str_contains($state, 'เหลือ') => 'success',   // สีเขียว
                        default => 'gray',
                    }),
                    //===============

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
