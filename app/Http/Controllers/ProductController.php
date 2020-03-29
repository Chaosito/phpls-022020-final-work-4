<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategories;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    const UPLOAD_IMAGES_DIR = 'img/cover';
    const IMAGE_OUT_WIDTH = 616;
    const IMAGE_OUT_HEIGHT = 353;

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

        $img = Image::make($request->file('image')->getRealPath());
        $img->fit(self::IMAGE_OUT_WIDTH,self::IMAGE_OUT_HEIGHT);
        $img->save(public_path(self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName));

//        $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);

        $createdId = Product::create([
            'category_id' => $request->category_id,
            'price' => $request->price * 2,
            'title' => $request->title,
            'description' => $request->description,
            'photo_path' => self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName,
        ]);

        return redirect()->route('product.item', ['id' => $createdId]);
    }

    public function item($id)
    {
        $productItem = Product::withTrashed()->with('category')->where('id','=', $id)->first();
        if ($productItem->deleted_at != null) {
            return view('message', ['title' => 'Error', 'message' => 'Извините, данного продукта не существует!']);
        }
        return view('products.item', [
            'product_title' => $productItem->title,
            'category_title' => $productItem->category->title,
            'item' => $productItem
        ]);
    }

    public function edit($id)
    {
        $product = Product::query()->find($id);
        $allCategories = ProductCategories::all();
        return view('products.edit', [
            'title' => 'Редактирование продукта',
            'categories' => $allCategories,
            'product' => $product
        ]);
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer|min:1',
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image',
        ]);

        $product = Product::query()->find($id);

        if ($request->hasFile('image')) {
            $newFileName = date('mdYHis').uniqid().'.'.$request->file('image')->extension();
//            $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);

            $img = Image::make($request->file('image')->getRealPath());
            $img->fit(self::IMAGE_OUT_WIDTH,self::IMAGE_OUT_HEIGHT);
            $img->save(public_path(self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName));

            unlink($product->photo_path);
            $product->photo_path = self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName;
        }

        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('product.item', ['id' => $id]);
    }

    public function delete($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route('category.all');
    }

}
