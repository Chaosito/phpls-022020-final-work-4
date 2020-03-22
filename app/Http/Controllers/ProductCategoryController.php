<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($id)
    {
//        return view('products.by-category', ['title' => 'my super titlez2']);
        $categoryTitle = ProductCategories::query()->select('title')->where('id', $id)->first()->title;


        $lastProducts = Product::query()->where('category_id','=',$id)->orderBy('id', 'desc')->paginate(6);
        return view('products.by-category', ['title' => 'Игры в разделе '.$categoryTitle, 'last_products' => $lastProducts]);
    }

    public function ListByCategory()
    {

    }
}
