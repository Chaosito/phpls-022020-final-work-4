@extends('layouts.gameshop')

@section('title', $title)
{{--@dd($news_item)--}}
@section('content-main')
    <div class="content-main__container">
        <!-- Main content block -->
        <div class="news-block content-text">
            <h3 class="content-text__title">
                {{ $news_item->title }}
            </h3><img src="{{ asset($news_item->image_path) }}" alt="Image" class="alignleft img-news">
            <p>
                {{ $news_item->description }}
            </p>
        </div>
        <!-- /Main content block -->
    </div>

    <div class="content-footer__container" style="margin-bottom: 50px;"></div>
@endsection

@section('content-bottom')
