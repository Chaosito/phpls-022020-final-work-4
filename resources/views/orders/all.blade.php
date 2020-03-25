@extends('layouts.gameshop')

@section('title', $title)

{{--@dd($orders);--}}

@section('content-main')
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($orders as $order)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="{{ asset($order->product->photo_path) }}" class="cart-product__item__product-photo__image"></div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="{{ Route('product.item', ['id' => $order->product->id]) }}">{{ $order->product->title }}</a></div>
                    </div>
                    <div class="cart-product__item__product-price">{{ $order->capacity }} шт.</div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">{{ $order->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{ $order->price }} ₽</span></div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content"><a href="mailto:{{ $order->user_mail }}">{{ $order->user_name }}</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="content-footer__container">
        {{$orders->links()}}
    </div>
@endsection

@section('content-bottom', '')
