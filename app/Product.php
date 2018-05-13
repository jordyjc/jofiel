<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'description', 'extract', 'price', 'image', 'stock', 'visible', 'category_id'];

    // Relación con la tabla categoria.

    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }
}
