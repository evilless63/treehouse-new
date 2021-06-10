@extends('user.layouts.main')

@section('content')
<div class="catalog">
  <div class="catalog__holder">
    <div class="page__row">


      @include('user.includes.profile-nav')

      <div class="page__middle">

        <div style="display:none">
          <div id="feedback_thanks">
            <div id="alert" class="featherlight-inner">
              <div class="popup popup_small">
                <div class="popup__holder">
                  <p class="popup__head">Спасибо!</p>
                  <p>Ваш отзыв успешно отправлен!</p>
                  <button type="button" class="button button_powdery featherlight-close">Продолжить</button>
                </div>
              </div>
            </div>
          </div>
          <div id="sure">
            <div class="popup popup_small">
              <div class="popup__holder">
                <p class="popup__head"></p>
                <p style="text-align:center;">Вы уверены, что хотите отменить<br>этот заказ?</p>
                <a href="#" class="button button_powdery">Да</a>
                <div class="login__recover">
                  <a href="#" class="login__recover-link featherlight-close">Нет</a>
                </div>
              </div>
            </div>
          </div>
          <div id="notice" class="featherlight-inner">
            <div class="popup popup_small">
              <div class="popup__holder">
                <p class="popup__head">Ваша заявка принята</p>
                <p>Наш менеджер свяжется с вами</p>
                <button type="button" class="button button_powdery featherlight-close">Продолжить</button>
              </div>
            </div>
          </div>
        </div>

        <div class="profile__orders-wrapper">
          <div class="profile__orders-head">
            <h2 class="profile__title" onclick="location.href='/user/orders';">Мои заказы</h2>
          </div>
          <div class="profile-orders accordion js-accordion profile__orders">
            <div class="accordion__item profile-orders__item">
              <div class="profile-orders__holder">
                <div class="accordion__head profile-orders__head">
                  <div class="profile-orders__title accordion__title">
                    №419206 от 18 января 2021 г. <div class="profile-orders__line">
                      <div class="profile-orders__status" data-role="status">Заказ ожидает оплату</div>
                      <div class="profile-orders__status js-popup"><a href="/user/cancel-order/419206?source=user" class="profile-orders__link question">отменить заказ</a></div>
                      <div class="profile-orders__status">
                        <a href="#" class="profile-orders__link">оплатить заказ</a>
                      </div>
                    </div>
                    <div class="accordion__icon profile-orders__icon"></div>
                  </div>
                </div>
              </div>
              <div class="accordion__box profile-orders__box" style="display: none;">
                <div class="profile-orders__goods-list">
                  <div class="goods goods_profile profile-orders__goods-item " data-block-id="823930" data-order="419206" data-model="105560" data-index="0">
                    <div class="goods__preview">
                      <a href="/catalog/trikotaz/vodolazka-tonkaa-iz-merinosovoj-sersti-104157" class="goods__link"><img src="/images/77x0_100_in/uploads/images/CATALOG/jersey/104157/5fed87ea29eb1-12storeez-21-12-20-h1482.jpg" alt="" class="goods__image"></a>
                    </div>
                    <div class="goods__box">
                      <div class="goods__spec">
                        <a href="/catalog/trikotaz/vodolazka-tonkaa-iz-merinosovoj-sersti-104157" class="goods__head">
                          <div class="goods__code">арт. 104157</div>
                          <div class="goods__title">Водолазка тонкая из мериносовой шерсти</div>
                        </a>
                        <div class="goods__info">
                          <div class="goods__info-line">
                            <div class="goods__size">S</div>
                            <div style="background-color: #f2f6fa" class="goods__color"></div>
                            <div class="goods__count">1 шт.</div>
                          </div>
                        </div>
                        <div class="goods__total">
                          <div class="goods__price">6&nbsp;980&nbsp;{{__('userpanel.currency')}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item profile-orders__item accordion__item_active">
              <div class="profile-orders__holder">
                <div class="accordion__head profile-orders__head">
                  <div class="profile-orders__title accordion__title">
                    №347717 от 27 июля 2020 г. <div class="profile-orders__line">
                      <div class="profile-orders__status" data-role="status">Отменён</div>
                    </div>
                    <div class="accordion__icon profile-orders__icon accordion__icon_active"></div>
                  </div>
                </div>
              </div>
              <div class="accordion__box profile-orders__box" style="display: block;">
                <div class="profile-orders__goods-list">
                  <div class="goods goods_profile profile-orders__goods-item " data-block-id="716348" data-order="347717" data-model="104414" data-index="0">
                    <div class="goods__preview">
                      <a href="/catalog/verhnaa-odezda/parka-legkaa-muzskaa-s-kapusonom-bezevyj" class="goods__link"><img src="/images/77x0_100_in/uploads/images/product/20200303/parka-legkaa-muzskaa-s-kapusonom-bescvetnyj/5ee721f52c3bb-12storeez-mart-2020-35854.jpg" alt="" class="goods__image"></a>
                    </div>
                    <div class="goods__box">
                      <div class="goods__spec">
                        <a href="/catalog/verhnaa-odezda/parka-legkaa-muzskaa-s-kapusonom-bezevyj" class="goods__head">
                          <div class="goods__code">арт. 102210</div>
                          <div class="goods__title">Парка легкая, с капюшоном</div>
                        </a>
                        <div class="goods__info">
                          <div class="goods__info-line">
                            <div class="goods__size">L</div>
                            <div style="background-color: #ddbb98" class="goods__color"></div>
                            <div class="goods__count">1 шт.</div>
                          </div>
                        </div>
                        <div class="goods__total">
                          <div class="goods__price">8&nbsp;980&nbsp;{{__('userpanel.currency')}}</div>
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
{{-- <link rel="stylesheet" href="{{asset('assets/js/base/styles.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('assets/js/wishlist/styles.css') }}">
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