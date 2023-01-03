<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'barcode',
        'brand_id',
        'measure_id',
        'category_id',
        'buy_price',
        'sale_price',
        'minimun_stock',
        'status'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function measure(){
        return $this->belongsTo(Measure::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
