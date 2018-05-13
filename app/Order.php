<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['subtotal', 'shipping', 'user_id'];


    // Relacion con los Usuarios

    public function  user()
    {
        return $this->belongsTo('App\User');
    }

    //

    public function order_item()
    {
        return $this->hasMany('App\OrderItem');
    }

}
