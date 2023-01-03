<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'sale_id',
        'price',
        'amount',
        'status',
    ];
}
