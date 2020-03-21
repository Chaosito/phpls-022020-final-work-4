<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('products.product', ['title' => 'my super title', 'view_data' => $this->globalViewData]);
    }

    public function ListByCategory($id)
    {

    }
}
