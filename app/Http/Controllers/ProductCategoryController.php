<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($id)
    {
        $categoryTitle = ProductCategories::query()->select('title')->where('id', $id)->first()->title;
        $lastProducts = Product::query()->where('category_id','=',$id)->orderBy('id', 'desc')->paginate(6);
        return view('products.by-category', ['title' => 'Игры в разделе '.$categoryTitle, 'last_products' => $lastProducts]);
    }

    public function listAll()
    {
//        $categories = ProductCategories::query()->orderBy('title')->paginate(20);

//        $this->model->leftJoin('Rooms', 'Properties.ID', '=', 'Rooms.Property')
//            ->selectRaw('Properties.*, count(Rooms.RoomID) as RoomsCount')
//            ->groupBy('Properties.ID')
//            ->get();

        $categories = ProductCategories::with('products')->orderBy('title')->paginate(20);
//        dd($categories, $categories->products);

        return view('products.categories', ['title' => 'Все категории', 'categories' => $categories]);
    }
}
