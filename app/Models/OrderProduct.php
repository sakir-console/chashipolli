<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table="order_products";

    public function productInfo()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function imgs()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }



}
