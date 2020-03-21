<?php

namespace App\Http\Controllers;

use App\ProductCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
        {
            $products = ProductCategories::query()->limit(5)->get(['id', 'title']);
//            dd($this->globalViewData);
            return view('products.product', ['products' => $products, 'title' => 'my super title', 'view_data' => $this->globalViewData]);
        }

        public function ListByCategory($id)
        {
            dd((int)$id);
        }

}
