<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
