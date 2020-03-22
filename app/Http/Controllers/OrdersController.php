<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function myOrders()
    {
//        $myOrders = Orders::query()
//            ->where('user_id', '=', Auth::User()->id)
//            ->orderBy('id', 'desc')
//            ->paginate(4);

        $myOrders = Orders::with('product')
            ->where('user_id', '=', Auth::User()->id)
            ->orderByDesc('id')
            ->paginate(4);
//        dd($myOrders);

        return view('orders.myorders', ['title' => 'Мои заказы', 'my_orders' => $myOrders]);
    }
}
