@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        @if(Auth::user() && Auth::user()->is_admin)
            <div class="content-footer__container">
                <nav>
                    <ul class="page-nav">
                        <li class="page-nav__item">
                            <a href="{{ Route('product.add', ['category_id' => $category_id]) }}" class="page-nav__item__link">Добавить продукт</a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
        <div class="products-columns">
            @foreach($last_products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="{{ Route('product.item', ['id' => $product->id]) }}" class="products-columns__item__title-product__link">
                            {{$product->title}}
                        </a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="{{ Route('product.item', ['id' => $product->id]) }}" class="products-columns__item__thumbnail__link">
                            <img src="{{asset($product->photo_path)}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                        </a>
                    </div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{$product->price}} руб</span>
                        <a href="#buy" data-product-id="{{ $product->id }}" class="btn btn-blue">Купить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="content-footer__container">
        {{$last_products->links()}}
    </div>
@endsection

@section('content-bottom', '')
