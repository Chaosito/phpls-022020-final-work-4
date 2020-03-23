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
        $categories = ProductCategories::with('products')->orderBy('title')->paginate(20);
        return view('products.categories', ['title' => 'Все категории', 'categories' => $categories]);
    }

    public function edit($id)
    {
        $category = ProductCategories::query()->where('id', $id)->first();
        return view('categories.edit', ['title' => 'Редактирование категории', 'category' => $category]);
    }

    public function save($id, Request $request)
    {
        ProductCategories::query()->where('id', $id)->update(['title' => $request->title, 'description' => $request->description]);
        return redirect()->route('products.category.edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $productsInCategory = (int)Product::query()->where('category_id', $id)->count();
        if ($productsInCategory > 0) {
            return "Категори содержит продукты. Нельзя удалить не пустую категорию!";
        } else {
            ProductCategories::query()->find($id)->delete();
            return redirect()->route('products.category.all');
        }
    }
}
