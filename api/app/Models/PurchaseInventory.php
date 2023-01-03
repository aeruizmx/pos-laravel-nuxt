<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'purchase_id',
        'price',
        'amount',
        'status',
    ];
}
