<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    public function Products()
    {
        return $this->hasMany(Product::class,'category_id', 'id');
    }
}
