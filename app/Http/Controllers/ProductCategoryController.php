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
        return view('categories.item', ['title' => 'Игры в разделе '.$categoryTitle, 'last_products' => $lastProducts, 'category_id' => $id]);
    }

    public function listAll()
    {
        $categories = ProductCategories::with('products')->orderBy('title')->paginate(20);
        return view('categories.list', ['title' => 'Все категории', 'categories' => $categories]);
    }

    public function edit($id)
    {
        $category = ProductCategories::query()->where('id', $id)->first();
        return view('categories.edit', ['title' => 'Редактирование категории', 'category' => $category]);
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        // Allow empty description
        $request->description = $request->description == null ? '' : $request->description;

        ProductCategories::query()->where('id', $id)->update(['title' => $request->title, 'description' => $request->description]);
        return redirect()->route('category.all', ['id' => $id]);
    }

    public function delete($id)
    {
        $productsInCategory = (int)Product::query()->where('category_id', $id)->count();
        if ($productsInCategory > 0) {
//            return "Категория содержит продукты. Нельзя удалить не пустую категорию!";
            return view('message', ['title' => 'Error', 'message' => 'Категория содержит продукты. Нельзя удалить не пустую категорию!']);
        } else {
            ProductCategories::query()->find($id)->delete();
            return redirect()->route('category.all');
        }
    }

    public function add()
    {
        return view('categories.add', ['title' => 'Добавление категории']);
    }

    public function append(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        // Allow empty description
        $request->description = $request->description == null ? '' : $request->description;

        $productCategory = new ProductCategories();
        $productCategory->title = $request->title;
        $productCategory->description = $request->description;
        $productCategory->save();
        return redirect()->route('category.all', ['id' => $productCategory->id]);
    }
}
