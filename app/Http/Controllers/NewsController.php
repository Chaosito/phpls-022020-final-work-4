<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    const UPLOAD_IMAGES_DIR = 'img/cover';

    public function add()
    {
        return view('news.add', ['title' => 'Добавление новости']);
    }
    public function append(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $newFileName = date('mdYHis').uniqid().'.'.$request->file('image')->extension();
        $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);


        $news = new News();
        $news->creator_id = Auth::user()->id;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->image_path = self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName;
        $news->save();

        return redirect()->route('news');
    }

    public function list()
    {
        $news = News::query()->orderBy('id', 'desc')->paginate(3);
        return view('news.list', ['title' => 'Новости', 'news' => $news]);
    }

    public function item($id)
    {
        $ourProducts = Product::all();
        $ourProducsArray = [$ourProducts->random(), $ourProducts->random(), $ourProducts->random()];
        $newsItem = News::query()->where('id','=', $id)->first();
        return view('news.item', ['title' => 'Новости', 'news_item' => $newsItem, 'our_products' => $ourProducsArray]);
    }

    public function edit($id)
    {
        $newsObject = News::query()->find($id);
        return view('news.edit', [
            'title' => 'Редактирование новости',
            'news' => $newsObject
        ]);
    }

    public function delete($id)
    {
        News::query()->find($id)->delete(); // and picture
        return redirect()->route('news');
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $news = News::query()->find($id);

        if ($request->hasFile('image')){
            $newFileName = date('mdYHis').uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(self::UPLOAD_IMAGES_DIR, $newFileName);
            unlink($news->image_path);
            $news->image_path = self::UPLOAD_IMAGES_DIR.DIRECTORY_SEPARATOR.$newFileName;
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();

        return redirect()->route('news.item', ['id' => $id]);
    }

}
