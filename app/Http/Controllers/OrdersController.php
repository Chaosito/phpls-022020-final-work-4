<?php

namespace App\Http\Controllers;

use App\Mail\ReceivedOrder;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function myOrders()
    {

        $myOrders = Orders::with('product')
            ->where('user_id', '=', Auth::User()->id)
            ->orderByDesc('id')
            ->paginate(4);
        return view('orders.myorders', ['title' => 'Мои заказы', 'my_orders' => $myOrders]);
    }

    public function buyWindow($id)
    {

        $userName = (Auth::User() ? Auth::User()->name : '');
        $userMail = (Auth::User() ? Auth::User()->email : '');
        // product name, description, price, count

        $product = Product::query()->where('id', '=', $id)->first();

        return view('orders.buy-window', ['id' => $id, 'product' => $product, 'user_name' => $userName, 'user_mail' => $userMail]);
    }

    public function buy(Request $request)
    {
        $order = new Orders();

        if (Auth::User()) {
            $order->user_id = Auth::User()->id;
        }

        $order->product_id = $request->product_id;
        $order->capacity = $request->capacity;

        $product = Product::query()->where('id', '=', $request->product_id)->select(['price', 'title'])->first();

        $order->price = $product->price;
        $order->user_mail = $request->user_mail;
        $order->user_name = $request->user_name;

        $result = $order->save();

//        $productTitle = Product::query()->find($request->product_id)->select('title')->first()->title;

//        dd($productTitle);

        Mail::to('sse0@mail.ru')->send(new ReceivedOrder($order, $product->title));


        return response()->json(['result' => (int)$result]);
    }
}
