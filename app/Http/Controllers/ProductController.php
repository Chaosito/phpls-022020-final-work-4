<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
        {
        }

        public function ListByCategory($id)
        {
            dd($id);
        }

}
