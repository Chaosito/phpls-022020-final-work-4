<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
