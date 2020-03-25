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
        $ourProducts = Product::all();
        $ourProducsArray = [$ourProducts->random(), $ourProducts->random(), $ourProducts->random()];
        return view('about', ['title' => 'О магазине', 'our_products' => $ourProducsArray]);
    }

    public function search(Request $request)
    {
        // Здесь можно (нужно) было использовать всякие крутые штуки для поиска,
        // типа Laravel Scout или ElasticSearch, но не будем заморачиваться,
        // сделаем примитивный поиск по БД.
        $products = Product::query()
            ->where('title', 'LIKE', '%'.$request->q.'%')
            ->orWhere('description', 'LIKE', '%'.$request->q.'%')
            ->paginate(6);
        return view('search', ['title' => 'Поиск "'.$request->q.'"', 'products' => $products]);
    }
}
