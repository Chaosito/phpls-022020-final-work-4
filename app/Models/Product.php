<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'price', 'title', 'description', 'photo_path',
    ];

    public function category()
    {
        return $this->hasOne(ProductCategories::class, 'id','category_id');
    }
}
