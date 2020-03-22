@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
{{--        @dd($last_products)--}}
        <div class="products-columns">
            @foreach($last_products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">{{$product->title}}</a></div>
                    <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="{{$product->photo_path}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-footer__container">
        <ul class="page-nav">
            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>
@endsection

@section('content-bottom','')
