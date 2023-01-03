<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'box_id',
        'purchase_id',
        'amount',
        'status',
    ];
}
