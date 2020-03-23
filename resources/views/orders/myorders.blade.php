@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($my_orders as $order)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{ asset($order->product->photo_path) }}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="{{ Route('products.item', ['id' => $order->product->id]) }}">{{ $order->product->title }}</a></div>
                </div>
                <div class="cart-product__item__product-price">{{ $order->capacity }} шт.</div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{ $order->created_at->format('d.m.Y H:i') }}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{ $order->price }} рублей</span></div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="content-footer__container">
        {{$my_orders->links()}}
    </div>
@endsection

@section('content-bottom', '')
