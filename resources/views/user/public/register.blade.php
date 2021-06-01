@extends('user.layouts.main')

@section('content')
    <div class="login">
        <div class="login__holder">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p class="popup__head">Регистрация</p>
            <form id="login-form" class="form login__form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Имя*</label><input type="text"
                        id="loginform-username" class="form__input" type="name" name="name" :value="old('name')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Фамилия</label><input type="text"
                        id="loginform-username" class="form__input" type="name" name="surname" :value="old('surname')">
                    <p class="form__error-message"></p>
                </div>

                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Отчество</label><input type="text"
                        id="loginform-username" class="form__input" type="name" name="patronymic"
                        :value="old('patronymic')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Телефон*</label><input type="text"
                        id="loginform-username" class="form__input" type="phone" name="phone" :value="old('phone')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Email</label><input type="text"
                        id="loginform-username" class="form__input" type="email" name="email" :value="old('email')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-password required">
                    <label class="form__label form__label_full" for="loginform-password">Пароль*</label><input
                        type="password" id="loginform-password" class="form__input" type="password" name="password" required
                        autocomplete="current-password" aria-required="true">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-password required">
                    <label class="form__label form__label_full" for="loginform-password">Подтвердите пароль*</label><input
                        type="password" id="loginform-password" class="form__input" type="password"
                        name="password_confirmation" required autocomplete="current-password" aria-required="true">
                    <p class="form__error-message"></p>
                </div>
                <button type="submit" class="button button_powdery login__button">Зарегистрироваться</button>
            </form>
            <div class="login__reg">
                <a href="/login" class="login__reg-link">Войти</a>
            </div>
            <div class="login__recover">
                <a href="/reset-password" class="login__recover-link">Восстановить пароль</a>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/fast-catalog-item/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/home/scripts.js') }}"></script>
@endsection

@section('head')
    <title>Регистрация</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">

    <meta name="description"
        content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">

    <link rel="stylesheet" href="{{ asset('assets/js/home/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('ssets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <style>
        .no-surname-show {
            display: none;
        }

        .no-surname .no-surname-show {
            display: block;
        }

        .no-surname .no-surname-hide {
            display: none;
        }

    </style>

@endsection

@section('html-class')
    <html lang="ru-RU" class="t-form">
@endsection
