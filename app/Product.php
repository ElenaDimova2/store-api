<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders() 
    {
      return $this->belongsToMany('App\Order', 'orders_products', 'order_id', 'product_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
