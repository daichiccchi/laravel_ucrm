<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling',
    ];

    // Purchaseモデルとのリレーション
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
