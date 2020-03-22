<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('products.category', ['title' => 'my super title2']);
    }

    public function ListByCategory($id)
    {

    }
}
