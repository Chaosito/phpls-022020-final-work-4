<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function list()
    {
        $news = News::query()->orderBy('id', 'desc')->paginate(3);
        return view('news.list', ['title' => 'Новости', 'news' => $news]);
    }
}
