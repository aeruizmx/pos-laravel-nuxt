<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'motive',
        'article_id',
        'buy',
        'sale',
        'amount',
        'type',
        'status',
    ];
}
