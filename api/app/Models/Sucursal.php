<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'document',
        'printer',
        'printer_url',
        'status',
    ];
}
