@extends('user.layouts.main')

@section('content')
<div class="catalog">
        <div class="catalog__holder">
          <div class="page__row">


            <div class="page__sidebar page__sidebar_left media-query-show_wide">
              <h1 class="page__title">Мой кабинет</h1>
              <div class="categories">
                <div class="categories__item"><a href="/user/cabinet" class="categories__link">Профиль</a></div>
                <div class="categories__item"><a href="/user/orders" class="categories__link">Мои заказы</a></div>
                <div class="categories__item"><a href="/user/subscribe" class="categories__link">Мои подписки</a></div>
                <div class="categories__item"><a href="/user/wishlist" class="categories__link">Wishlist</a></div>
                <div class="categories__item"><a href="/user/logout" class="categories__link">Выход</a></div>
              </div>
            </div>

            <div class="page__middle profile-subscribes__list">
              <div class="profile__orders-wrapper">
  <div class="profile__orders-head">
      <h2 class="profile__title">Подписки</h2>
  </div>
                                                          <div class="profile-orders accordion profile__orders profile-subscribes__item" data-key="104135">
          <div class="profile-orders__box">
              <div class="profile-orders__goods-list">
                  <div class="goods goods_profile profile-orders__goods-item">
                      <div class="goods__preview">
                          <a href="/catalog/trikotaz/dzemper-iz-kasemira-i-sersti-rozovyj" class="goods__link"><img src="/images/77x0_100_in/uploads/images/product/20200116/dzemper-iz-kasemira-i-sersti-rozovyj/5ee721f5258b7-kropnutye-20.jpg" alt="" class="goods__image"></a>
                      </div>
                      <div class="goods__box">
                          <div class="goods__spec">
                              <a href="/catalog/trikotaz/dzemper-iz-kasemira-i-sersti-rozovyj" class="goods__head">
                                  <div class="goods__code">арт. 103273</div>
                                  <div class="goods__title">Джемпер из кашемира и шерсти</div>
                              </a>
                              <div class="goods__info">
                                  <div class="goods__info-line">
                                      <div class="goods__size">S</div>
                                      <div style="background-color: #ffd2e8" class="goods__color"></div>
                                                                                                      <div class="goods__count">Ожидает</div>
                                                                                              </div>
                              </div>
                              <div class="goods__total">
                              <div class="goods__price">19&nbsp;980&nbsp;₽</div>
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
  <script src="{{asset('assets/js/utils.js"></script>
@endsection

@section('head')
<title>Интернет-магазин детской одежды - Дом на дереве</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
  <link rel="stylesheet" href="{{asset('assets/js/base/styles.css')}}">
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