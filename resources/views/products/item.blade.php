@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="{{ asset($item->photo_path) }}" class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{ $item->title }}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{ $item->price }}</b>
                        руб
                    </div><a href="#buy" data-product-id="{{ $item->id }}" class="btn btn-blue">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    <p>
                        {!! $item->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom')
