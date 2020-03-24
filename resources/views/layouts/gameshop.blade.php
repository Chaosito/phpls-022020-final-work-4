<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') - {{ config('app.name', 'Shop') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

    <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
    <!-- arcticModal -->
    <script src="{{ asset('js/arcticmodal/jquery.arcticmodal-0.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/arcticmodal/jquery.arcticmodal-0.3.css') }}">
    <!-- arcticModal theme -->
        <link rel="stylesheet" href="{{ asset('js/arcticmodal/themes/simple.css') }}">
</head>
<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container">
            <a href="{{Route('index')}}" class="logotype-link">
                <img src="{{ asset('img/logo.png') }}" alt="Логотип">
            </a>
        </div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="{{Route('index')}}" class="nav-list__item__link">Главная</a></li>
                @auth
                <li class="nav-list__item"><a href="{{Route('orders.my')}}" class="nav-list__item__link">Мои заказы</a></li>
                @endauth
                <li class="nav-list__item"><a href="{{Route('news')}}" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="{{Route('about')}}" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone">
                <a href="#" class="header-contact__phone-link">Телефон: {{$phone_to}}</a>
            </div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block">
                        <a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a>
                    </div>
                    <div class="payment-basket__status__basket">
                        <span class="payment-basket__status__basket-value">0</span>
                        <span class="payment-basket__status__basket-value-descr">товаров</span>
                    </div>
                </div>
            </div>


            @guest
                <div class="authorization-block">
                    <a href="{{ route('register') }}" class="authorization-block__link">{{ __('auth.Register') }}</a><a href="{{ route('login') }}" class="authorization-block__link">{{ __('auth.Login') }}</a>
                </div>
            @else
                @php
                  $adminStyle = (Auth::user()->is_admin == 1 ? 'color:red;' : '');
                @endphp
                <div class="authorization-block">
                    <a href="{{ route('home') }}" class="authorization-block__link" style="{{$adminStyle}}">{{ Auth::user()->name }}</a><a href="{{ route('logout') }}" class="authorization-block__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.Logout') }}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </header>
    <div class="middle">
        <div class="sidebar">
            @if(Auth::user() && Auth::user()->is_admin)
            <div class="sidebar-item">
                <div class="sidebar-item__title">Admin</div>
                <div class="sidebar-item__content">
                    <ul class="sidebar-category">
                        <li class="sidebar-category__item">
                            <a href="{{Route('site.settings')}}" class="sidebar-category__item__link">
                                Настройки
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            @if(count($main_categories))
            <div class="sidebar-item">
                <div class="sidebar-item__title">Категории</div>
                <div class="sidebar-item__content">
                    <ul class="sidebar-category">
                        @foreach($main_categories as $category)
                            <li class="sidebar-category__item">
                                <a href="{{Route('category.in', ['id' => $category->id])}}" class="sidebar-category__item__link">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                        <li class="sidebar-category__item">
                            <a href="{{Route('category.all')}}" class="sidebar-category__item__link">
                                Больше категорий
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            @if($last_news)
            <div class="sidebar-item">
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        @foreach($last_news AS $new)
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news">
                                <img src="{{ asset($new->image_path) }}" alt="image-new" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news">
                                <a href="{{ Route('news.item', ['id' => $new->id]) }}" class="sidebar-news__item__title-news__link">{{ $new->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="main-content">
            @section('content-top')
                <div class="content-top">
                    <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                    <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
                </div>
            @show
            <div class="content-middle">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">@yield('title')</div>
                    </div>
                    <div class="content-head__search-block">
                        <div class="search-container">
                            <form class="search-container__form" action="{{ Route('search') }}">
                                <input type="text" name="q" class="search-container__form__input">
                                <button class="search-container__form__btn">Поиск</button>
                            </form>
                        </div>
                    </div>
                </div>
                @yield('content-main')
            </div>

            <div class="content-bottom">
                @yield('content-bottom')
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            @if(isset($random_footer_item))
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">
                    <div class="item-product">
                        <div class="item-product__title-product">
                            <a href="#" class="item-product__title-product__link">{{ $random_footer_item->title }}</a>
                        </div>
                        <div class="item-product__thumbnail">
                            <a href="#" class="item-product__thumbnail__link">
                                <img src="{{ asset($random_footer_item->photo_path) }}" alt="Preview-image" class="item-product__thumbnail__link__img">
                            </a>
                        </div>
                        <div class="item-product__description">
                            <div class="item-product__description__products-price"><span class="products-price">{{ $random_footer_item->price }} руб</span></div>
                            <div class="item-product__description__btn-block"><a href="#buy" data-product-id="{{ $random_footer_item->id }}" class="btn btn-blue">Купить</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="footer__footer-content__main-content" id="about-block">
                <p>
                    Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                    онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                    У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                    и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                    коды продления и многое друго. Также здесь всегда можно узнать последние новости
                    из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                    актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                    что немаловажно, выгодно!
                </p>
            </div>
        </div>
        <div class="footer__social-block">
            <ul class="social-block__list bcg-social">
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
