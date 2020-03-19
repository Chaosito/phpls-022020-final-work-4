<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
//        var_dump($books);
        return view('books.list', ['books' => $books]);
    }
}
