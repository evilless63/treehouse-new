@extends('user.layouts.main')

@section('content')
    <div class="login">
        <div class="login__holder">
            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <p class="popup__head">Регистрация</p>
            <form id="login-form" class="form login__form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Имя* (только буквы и пробел)</label><input type="text"
                        id="loginform-username" class="form__input" type="name" name="name" :value="old('name')">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Фамилия</label><input type="text"
                        id="loginform-username" class="form__input" type="surname" name="surname" :value="old('surname')">
                        @if ($errors->has('surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('surname') }}</strong>
                    @endif
                </div>

                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Отчество</label><input type="text"
                        id="loginform-username" class="form__input" type="name" name="patronymic"
                        :value="old('patronymic')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Телефон* (11 символов в формате <strong>79992222222</strong>)</label><input type="text"
                        id="loginform-username-phone" class="form__input" type="phone" name="phone" :value="old('phone')">
                    <script>
                        let loginformPhone = document.getElementById('loginform-username-phone')
                        loginformPhone.onblur = function() {
                            if (!loginformPhone.value == '') { // не email
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{url('/clean-phone')}}",
                                    type: "post",
                                    data: {
                                        phone: loginformPhone.value,
                                    },
                                    success: function(response) {
                                        loginformPhone.value = response
                                        console.log(response)
                                    }
                                })
                            }
                        }
                    </script>
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                    @endif
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-username">
                    <label class="form__label form__label_full" for="loginform-username">Email</label><input type="text"
                        id="loginform-username" class="form__input" type="email" name="email" :value="old('email')">
                    <p class="form__error-message"></p>
                </div>
                <div class="form__item field-loginform-password required">
                    <label class="form__label form__label_full" for="loginform-password">Пароль (минимум 8 символов) *</label><input
                        type="password" id="loginform-password" class="form__input" type="password" name="password" required
                        autocomplete="current-password" aria-required="true">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="form__item field-loginform-password required">
                    <label class="form__label form__label_full" for="loginform-password">Подтвердите пароль (минимум 8 символов) *</label><input
                        type="password" id="loginform-password" class="form__input" type="password"
                        name="password_confirmation" required autocomplete="current-password" aria-required="true">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="login__recover">
                    <a href="/reset-password-phone" class="login__recover-link">Восстановить пароль</a>
                </div>
                <button type="submit" class="button button_powdery login__button">Зарегистрироваться</button>
            </form>
            <div class="login__reg">
                <a href="/login" class="login__reg-link">Войти</a>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
