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
            <h3 class="content-text__title">
                {{ $news_item->title }}
            </h3><img src="{{ asset($news_item->image_path) }}" alt="Image" class="alignleft img-news">
            <p>
                {!! $news_item->description !!}
            </p>
        </div>
        <!-- /Main content block -->
    </div>

    <div class="content-footer__container" style="margin-bottom: 50px;"></div>
@endsection

@section('content-bottom')
