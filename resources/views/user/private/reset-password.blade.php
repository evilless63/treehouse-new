@extends('user.layouts.main')

@section('content')
    <div class="catalog">
        <div class="catalog__holder">
            <div class="page__row">

                @include('user.includes.profile-nav')

                <div class="page__middle">
                    <div class="profile-edit profile__edit">
                        <form id="login-form" class="form login__form" action="{{ route('password.reset') }}"
                            method="post">
                            @csrf
                            <div class="profile-edit__row">
                                <div class="profile-edit__column">
                                    <div class="profile-edit__item">
                                        <div class="profile-edit__holder">
                                            @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @elseif ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <h2 class="profile-edit__title">{{ __('userpanel.personal_data') }}</h2>

                                            <div class="form__item field-loginform-password required">
                                                <label class="form__label form__label_full" for="loginform-password">Старый
                                                    пароль*</label><input type="password" id="loginform-password"
                                                    class="form__input" type="password" name="old_password" required
                                                    autocomplete="old_password" aria-required="true">
                                                <p class="form__error-message"></p>
                                            </div>
                                            <div class="form__item field-loginform-password required">
                                                <label class="form__label form__label_full"
                                                    for="loginform-password">Пароль*</label><input type="password"
                                                    id="loginform-password" class="form__input" type="password"
                                                    name="password" required autocomplete="current-password"
                                                    aria-required="true">
                                                <p class="form__error-message"></p>
                                            </div>
                                            <div class="form__item field-loginform-password required">
                                                <label class="form__label form__label_full"
                                                    for="loginform-password">Подтвердите пароль*</label><input
                                                    type="password" id="loginform-password" class="form__input"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="current-password" aria-required="true">
                                                <p class="form__error-message"></p>
                                            </div>
                                            <button type="submit" class="button button_powdery login__button">Изменить
                                                пароль</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>


    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.infinitescroll.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/yii.validation.js') }}"></script>
    <script src="{{ asset('assets/js/yii.activeform.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/intellinput.js') }}"></script>
    <script src="{{ asset('assets/js/whishlist/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/base/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/utils.js') }}"></script>
@endsection

@section('head')
    <title>Интернет-магазин детской одежды - Дом на дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
    <link rel="stylesheet" href="{{ asset('assets/js/base/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/intellinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <style>
        /* SITEDEV-2039 */

        .catalog-list__info_head {
            min-height: auto;
        }

        .catalog-list__info_head,
        .catalog-list__not-available {
            margin-bottom: 15px;
        }

        .catalog-list__sale {
            position: initial;
        }

        /* SITEDEV-2039 END */

    </style>
    <style>
        .mobile .card-speed-buy {
            bottom: 0;
            padding: 10px 40px;
        }

        .mobile .card-speed-buy .catalog-list__link,
        .mobile .card-speed-buy .card-sizes,
        .mobile .card-speed-buy .card__button-wrapper {
            display: none;
        }

        .mobile .card-speed-buy .card__wish {
            display: block;
        }

    </style>
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
    <html lang="ru-RU" class="">
@endsection
