<?php
use Illuminate\Support\Facades\Session;
?><!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4b1f7f658a.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
{{--<div id="app">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">--}}
{{--        <a class="navbar-brand" href="{{ route('main') }}">Главная</a>--}}

{{--        <a class="navbar-brand" href="{{ route('contacts') }}">Контакты</a>--}}

{{--        <a class="navbar-brand" href="#">Корзина</a>--}}

{{--        <a class="navbar-brand" href="#">Оформление заказа</a>--}}

{{--        <a class="navbar-brand" href="{{ route('delivery') }}">Условия доставки</a>--}}
{{--    </nav>--}}
{{--</div>--}}

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('main') }}">Главная</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('order.form') }}">Оформление заказа</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('delivery') }}">Условия доставки</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('cart.show') }}">
                    <i class="fas fa-shopping-cart"></i> Корзина
                    <span class="badge badge-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>