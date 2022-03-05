@extends('user.layouts.main')

@section('content')
<div class="login">
        <div class="login__holder">
          <p class="popup__head">Вход</p>
          <form id="login-form" class="form login__form" action="{{ route('password.email') }}" method="post">
          @csrf
            <div class="form__item field-loginform-username">
              <label class="form__label form__label_full" for="loginform-username">Укажите номер телефона, использованный при регистрации</label><input
                type="text" id="loginform-username" class="form__input"  type="phone" name="phone" :value="old('phone')">
              <p class="form__error-message"></p>
              @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="button button_powdery login__button">Продолжить</button>
          </form>
          <div class="login__reg">
            <a href="/register" class="login__reg-link">Зарегистрироваться</a>
          </div>
          

        </div>
      </div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.js')}}"></script>
  <script src="{{asset('assets/js/yii.js')}}"></script>
  <script src="{{asset('assets/js/chunks/vendor.js')}}"></script>
  <script src="{{asset('assets/js/chunks/layout-base.js')}}"></script>
  <script src="{{asset('assets/js/fast-catalog-item/scripts.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/autocomplete.js')}}"></script>
  <script src="{{asset('assets/js/home/scripts.js')}}"></script>
@endsection

@section('head')
<title>Авторизация</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
  
  <meta name="description"
    content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
  
  <link rel="stylesheet" href="{{asset('assets/js/home/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/fast-catalog-item/styles.css')}}">
  <link rel="stylesheet" href="{{asset('ssets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/autocomplete.css')}}">
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
