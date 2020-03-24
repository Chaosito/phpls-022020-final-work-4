<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const UPLOAD_IMAGES_DIR = 'img/cover';

    public function add(Request $request)
    {
        $allCategories = ProductCategories::all();
        return view('products.add', [
            'title' => 'Добавление продукта',
            'categories' => $allCategories,
            'current_category' => $request->category_id
        ]);
    }

    public function append(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer|min:1',
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $newFileName = date('mdYHis').uniqid().'.'.$request->file('image')->extension();
        $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);


        $newProduct = new Product();
        $newProduct->category_id = $request->category_id;
        $newProduct->price = $request->price;
        $newProduct->title = $request->title;
        $newProduct->description = $request->description;
        $newProduct->photo_path = self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName;
        $newProduct->save();

        return redirect()->route('products.item', ['id' => $newProduct->id]);
    }

    public function item($id)
    {
        $productItem = Product::withTrashed()->with('category')->where('id','=', $id)->first();
        if ($productItem->deleted_at != null) {
            return view('message', ['title' => 'Error', 'message' => 'Извините, данного продукта не существует!']);
        }
        return view('products.item', [
            'title' => $productItem->title.' в разделе '.$productItem->category->title,
            'item' => $productItem
        ]);
    }

    public function edit($id)
    {
        $product = Product::query()->find($id);
        $allCategories = ProductCategories::all();
        return view('products.edit', [
            'title' => 'Добавление продукта',
            'categories' => $allCategories,
            'product' => $product
        ]);
    }

    public function save($id, Request $request)
    {
//            dd($id, $request);
        $this->validate($request, [
            'category_id' => 'required|integer|min:1',
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image',
        ]);

        $product = Product::query()->find($id);

        if ($request->hasFile('image')){
            $newFileName = date('mdYHis').uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);
            unlink($product->photo_path);
            $product->photo_path = self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName;
        }

        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.item', ['id' => $id]);
    }

    public function delete($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route('category.all');
    }

}
