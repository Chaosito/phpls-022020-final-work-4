@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <div class="news-list__container">
            @foreach($news as $news_item)
            <div class="news-list__item">
                <div class="news-list__item__thumbnail"><img src="{{ asset($news_item->image_path) }}"></div>
                <div class="news-list__item__content">
                    <div class="news-list__item__content__news-title">{{ $news_item->title }}</div>
                    <div class="news-list__item__content__news-date">{{ $news_item->updated_at->format('d.m.Y') }}</div>
                    <div class="news-list__item__content__news-content">
                        {!! Str::limit($news_item->description, 300, $end = '...') !!}
                    </div>
                </div>
                <div class="news-list__item__content__news-btn-wrap"><a href="{{ Route('news.item', ['id' => $news_item->id]) }}" class="btn btn-brown">Подробнее</a></div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="content-footer__container">
        {{$news->links()}}
    </div>
@endsection

@section('content-bottom', '')
