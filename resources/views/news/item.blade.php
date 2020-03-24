@extends('layouts.gameshop')

@section('title', $title)
{{--@dd($news_item)--}}
@section('content-main')
    <div class="content-main__container">
        @if(Auth::user() && Auth::user()->is_admin)
            <div class="content-footer__container">
                <nav>
                    <ul class="page-nav">
                        <li class="page-nav__item">
                            <a href="{{ Route('news.edit', ['id' => $news_item->id]) }}" class="page-nav__item__link">Редактировать</a>
                        </li>
                        <li class="page-nav__item">
                            <a href="{{ Route('news.delete', ['id' => $news_item->id]) }}" class="page-nav__item__link">Удалить</a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
        <!-- Main content block -->
        <div class="news-block content-text">
            <h3 class="content-text__title">{{ $news_item->title }}</h3>
            <img src="{{ asset($news_item->image_path) }}" alt="Image" class="alignleft img-news">
            <div style="min-height: 150px;">
                <p>
                    {!! $news_item->description !!}
                </p>
            </div>
        </div>
        <!-- /Main content block -->
    </div>

    <div class="content-footer__container" style="margin-bottom: 50px;"></div>
@endsection

@section('content-bottom')
    <!-- Optional bottom block -->
    <div class="line"></div>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($our_products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="#" class="products-columns__item__title-product__link">
                            {{ $product->title }}
                        </a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="#" class="products-columns__item__thumbnail__link">
                            <img src="{{ asset($product->photo_path) }}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                        </a>
                    </div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{ $product->price }} руб</span>
                        <a href="#buy" data-product-id="{{ $product->id }}" class="btn btn-blue">Купить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /Optional bottom block -->
@endsection
