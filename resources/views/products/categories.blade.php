@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach($categories as $category)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="" class="cart-product__item__product-photo__image"></div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="{{Route('products.category', ['id' => $category->id])}}">{{ $category->title }}</a></div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">{{ count($category->products) }} шт.</div>
                    </div>
                    @if (Auth::User() && Auth::User()->is_admin == 1)
                        <div class="cart-product__item__product-price">
                            <span class="product-price__value">
                                <a href="{{ Route('products.category.edit', ['id' => $category->id]) }}">Edit</a>
                                <a href="#">Delete</a>
                            </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="content-footer__container">
        {{$categories->links()}}
    </div>
@endsection

@section('content-bottom', '')
