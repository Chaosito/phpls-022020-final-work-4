<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastProducts = Product::query()->orderBy('id', 'desc')->paginate(6);
        return view('index', ['title' => 'Последние товары', 'last_products' => $lastProducts]);
    }

    public function about()
    {
        return view('about', ['title' => 'О магазине']);
    }

    public function search(Request $request)
    {
//        dd($request);
        return view('about', ['title' => 'Поиск "'.$request->q.'"']);
    }
}
