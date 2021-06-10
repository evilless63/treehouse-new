@extends('user.layouts.main')

@section('content')
<div class="catalog">
  <div class="catalog__holder">
    <div class="page__row">

      @include('user.includes.profile-nav')
    
      <div class="page__middle">
        <div class="profile-edit profile__edit">
          <form id="dynamic-form" class="form profile-edit__form" action="{{route('user.update_profile', $user->id)}}" method="post" autocomplete="off">
            @csrf
            @method('patch')
            <div class="profile-edit__row">
              <div class="profile-edit__column">
                <div class="profile-edit__item">
                  <div class="profile-edit__holder">
                    <h2 class="profile-edit__title">{{__('userpanel.personal_data')}}</h2>

                    <div class="form__item field-user-email required">
                      <label class="form__label" for="user-email">{{__('userpanel.email')}}</label>
                      <div class="form__field"><input type="text" class="form__input" id="user-email" class="form__input" name="email" value="{{$user->email}}" disabled="" maxlength="255" aria-required="true">
                        <p class="form__error-message"></p>
                      </div>
                    </div>
                    <div class="form__item">
                      <label for="pass" class="form__label">Пароль</label>
                      <div class="form__field"><a href="/reset-password" class="link ">сменить пароль</a></div>
                    </div>

                    <div class="form__item field-user-name">
                      <label class="form__label" for="user-name">{{__('userpanel.name')}}</label>
                      <div class="form__field"><input type="text" class="form__input" id="user-name" class="form__input" name="name" maxlength="255" value="{{$user->name}}">
                        <p class="form__error-message"></p>
                      </div>
                    </div>
                    <div class="form__item no-surname-hide field-user-surname">
                      <label class="form__label" for="user-surname">{{__('userpanel.surname')}}</label>
                      <div class="form__field"><input type="text" class="form__input" id="user-surname" class="form__input" name="surname" maxlength="255" value="{{$user->surname}}">
                        <p class="form__error-message"></p>
                      </div>
                    </div>
                    <div class="form__item no-surname-hide field-user-surname">
                      <label class="form__label" for="user-surname">{{__('userpanel.patronymic')}}</label>
                      <div class="form__field"><input type="text" class="form__input" id="user-patronymic" class="form__input" name="patronymic" maxlength="255" value="{{$user->patronymic}}">
                        <p class="form__error-message"></p>
                      </div>
                    </div>
                    <div class="form__item field-user-number">
                      <label class="form__label" for="user-number">{{__('userpanel.phone')}}</label>
                      <div class="form__field">
                        <input type="tel" id="user-number" disabled="" class="form__input" name="phone" autocomplete="off" placeholder="+7" value="{{$user->phone}}">
                        <p class="form__error-message"></p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>

        </div>

        <div class="profile-edit__confirm">
          <div class="checkbox form__checkbox field-user-accept">
            <input type="hidden" value="0"><input type="checkbox" id="user-accept" class="checkbox__input" value="1"><label class="checkbox__label" for="user-accept"><span class="checkbox__label-text">{{__('userpanel.change_accert')}}<a href="/r/privacy_policy" class="checkbox__link" target="_blank">{{__('userpanel.subscribe_link')}}</a></span></label>
            <p class="form__error-message"></p>
          </div>
        </div>
        <button type="submit" class="button button_powdery button_fixed profile-edit__button card__button_with-spaces save">{{__('userpanel.save_changes_button_text')}}</button>
        </form>


      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery.infinitescroll.js')}}"></script>
<script src="{{asset('assets/js/yii.js')}}"></script>
<script src="{{asset('assets/js/yii.validation.js')}}"></script>
<script src="{{asset('assets/js/yii.activeform.js')}}"></script>
<script src="{{asset('assets/js/jquery.pjax.js')}}"></script>
<script src="{{asset('assets/js/chunks/vendor.js')}}"></script>
<script src="{{asset('assets/js/chunks/layout-base.js')}}"></script>
<script src="{{asset('assets/js/intellinput.js')}}"></script>
<script src="{{asset('assets/js/whishlist/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>
<script src="{{asset('assets/js/base/scripts.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
@endsection

@section('head')
<title>Интернет-магазин детской одежды - Дом на дереве</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
<meta name="description" content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
<link rel="stylesheet" href="{{asset('assets/js/base/styles.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/intellinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/autocomplete.css')}}">
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