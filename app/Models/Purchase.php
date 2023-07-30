<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
    ];

    // Customerモデルとのリレーション
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    // Itemモデルとのリレーション
    public function items()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
