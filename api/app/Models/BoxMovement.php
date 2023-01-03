<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'motive',
        'box_id',
        'amount',
        'type',
        'status',
    ];
}
