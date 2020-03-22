<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
        {
        }

        public function item($id)
        {
            $productItem = Product::with('category')->where('id','=', $id)->first();
            return view('products.item', [
                'title' => $productItem->title.' в разделе '.$productItem->category->title,
                'item' => $productItem
            ]);
        }

}
