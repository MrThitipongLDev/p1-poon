<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'typeId','MFG','EXP','qty'];

    public function TypeProduct(): BelongsTo{
        return $this->belongsTo(TypeProduct::class, 'typeId');
    }
}
