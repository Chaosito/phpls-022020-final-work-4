@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($last_products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="{{ Route('products.item', ['id' => $product->id]) }}" class="products-columns__item__title-product__link">
                            {{$product->title}}
                        </a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="{{ Route('products.item', ['id' => $product->id]) }}" class="products-columns__item__thumbnail__link">
                            <img src="{{asset($product->photo_path)}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                        </a>
                    </div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{$product->price}} руб</span>
                        <a href="#" class="btn btn-blue">Купить</a>
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
