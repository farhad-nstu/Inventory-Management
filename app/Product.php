<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'category_id', 'supplier_id','product_code', 'product_garage', 'product_route','product_image','buying_date', 'expire_date', 'buying_price','selling_price',
    ];
}
