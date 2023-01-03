<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'box_id',
        'sale_id',
        'amount',
        'status',
    ];
}
