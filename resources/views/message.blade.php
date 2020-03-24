@extends('layouts.gameshop')

@section('content-top', '')

@section('title', $title ?? '')

@section('content-main')
    <div class="content-main__container">
        <div style="background-color: red;margin:30px;padding:20px;">{{ $message }}</div>
        <div>
            <a href="{{ URL::previous() }}" class="btn">Вернуться назад</a>
        </div>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom', '')
