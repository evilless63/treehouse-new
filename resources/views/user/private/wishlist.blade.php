@extends('user.layouts.main')

@section('content')
<div class="catalog">
  <div class="catalog__holder">
    <div class="page__row">


      <div class="page__sidebar page__sidebar_left media-query-show_wide">
        <h1 class="page__title">{{__('userpanel.my_lc_title')}}</h1>
        <div class="categories">
          <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/cabinet')}}" class="categories__link">{{__('userpanel.lc_profile')}}</a></div>
          <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/orders')}}" class="categories__link">{{__('userpanel.lc_orders')}}</a></div>
          <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/subscribe')}}" class="categories__link">{{__('userpanel.lc_subscribtions')}}</a></div>
          <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/wishlist')}}" class="categories__link">Wishlist</a></div>
          <div class="categories__item">

            <form method="POST" action="{{LaravelLocalization::localizeUrl('/logout')}}">
              @csrf
              <a onclick="event.preventDefault();this.closest('form').submit();" class="categories__link">{{__('userpanel.logout')}}</a>
            </form>

          </div>
        </div>
      </div>

      <div class="page__middle">






        <!--Костыль SITEDEV-2034 (перенести на фронт после выкатки пересборки)-->
        <style>
          .card-sizes__from-shop,
          .card-sizes__label-wrap:hover .card-sizes__from-shop .card-sizes__title,
          .card-sizes__item:hover .is_stocks .card-sizes__from-shop {
            background-color: transparent;
            border-color: #dbd7d2;
            color: #dbd7d2 !important;
          }
        </style>
        <!--Костыль SITEDEV-2034 end-->

        <div class="catalog-list catalog-list_wrap catalog__list">
          <div class="catalog-list__holder">
            <div class="catalog-list__row">


              <div style="display: none">
                <div data-role="add_item" class="popup popup_small" data-model-id="_105590">
                  <div class="popup__holder">
                    <p class="popup__head">Спасибо!</p>

                    <center>
                      <p>Товар успешно добавлен в корзину.</p>
                    </center>
                    <a href="/cart" class="button button_powdery">Оформить заказ</a>
                    <div class="login__recover">
                      <a href="#" class="login__recover-link featherlight-close">Продолжить покупки</a>
                    </div>
                  </div>
                </div>

                <div data-role="select_size" class="popup popup_small" data-model-id="_105590" id="sizes-_105590">
                  <div class="popup__holder card-sizes-popup">
                    <p class="popup__head">Выберите размер</p>
                    <div class="card-sizes card__sizes">
                      <div class="card-sizes__list">
                        <div class="card-sizes__item">
                          <input data-model-id="_105590" type="radio" name="sizes-popup" id="sp125393" data-sid="s125393" value="125393" class="card-sizes__input" data-url="/cart/add-item/125393/1">
                          <label for="sp125393" href="/catalog/item-subscribe/125393" class="card-sizes__label-wrap js-label_in_popup">

                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                XS </span>
                            </span>
                          </label>

                        </div>
                        <div class="card-sizes__item">
                          <input data-model-id="_105590" type="radio" name="sizes-popup" id="sp125392" data-sid="s125392" value="125392" class="card-sizes__input" data-url="/cart/add-item/125392/1">
                          <label for="sp125392" href="/catalog/item-subscribe/125392" class="card-sizes__label-wrap js-label_in_popup">

                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                S </span>
                            </span>
                          </label>

                        </div>
                        <div class="card-sizes__item">
                          <input data-model-id="_105590" type="radio" name="sizes-popup" id="sp125391" data-sid="s125391" value="125391" class="card-sizes__input" data-url="/cart/add-item/125391/1">
                          <label for="sp125391" href="/catalog/item-subscribe/125391" class="card-sizes__label-wrap js-label_in_popup">

                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                M </span>
                            </span>
                          </label>

                        </div>
                        <div class="card-sizes__item">
                          <input data-model-id="_105590" type="radio" name="sizes-popup" id="sp125390" data-sid="s125390" value="125390" class="card-sizes__input" data-url="/cart/add-item/125390/1" disabled="disabled">
                          <label for="sp125390" href="/catalog/item-stocks/125390" class="card-sizes__label-wrap js-popup-subscribe">

                            <span class="card-sizes__label card-sizes__from-shop">
                              <span class="card-sizes__title">
                                L </span>
                            </span>
                            <div class="card-sizes__comment">подписка</div>
                          </label>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div data-role="select_wishlist_size" class="popup popup_small" data-model-id="_105590">
                  <div class="popup__holder">
                    <h4 class="featherlight-title">Выберите размер</h4>
                    <div class="card-sizes card__sizes">
                      <div class="card-sizes__list">
                        <div class="card-sizes__item">
                          <input type="radio" data-model="105590" data-model-id="_105590" name="wishlist-sizes-popup" id="wsp125393" value="125393" class="card-sizes__input" checked="checked">

                          <label href="/catalog/item-subscribe/125393" for="wsp125393" class="card-sizes__label-wrap js-label_in_popup">
                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                XS </span>
                            </span>

                          </label>
                        </div>
                        <div class="card-sizes__item">
                          <input type="radio" data-model="105590" data-model-id="_105590" name="wishlist-sizes-popup" id="wsp125392" value="125392" class="card-sizes__input" checked="checked">

                          <label href="/catalog/item-subscribe/125392" for="wsp125392" class="card-sizes__label-wrap js-label_in_popup">
                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                S </span>
                            </span>

                          </label>
                        </div>
                        <div class="card-sizes__item">
                          <input type="radio" data-model="105590" data-model-id="_105590" name="wishlist-sizes-popup" id="wsp125391" value="125391" class="card-sizes__input" checked="checked">

                          <label href="/catalog/item-subscribe/125391" for="wsp125391" class="card-sizes__label-wrap js-label_in_popup">
                            <span class="card-sizes__label ">
                              <span class="card-sizes__title">
                                M </span>
                            </span>

                          </label>
                        </div>
                        <div class="card-sizes__item">
                          <input type="radio" data-model="105590" data-model-id="_105590" name="wishlist-sizes-popup" id="wsp125390" value="125390" class="card-sizes__input" checked="checked">

                          <label href="/catalog/item-subscribe/125390" for="wsp125390" class="card-sizes__label-wrap js-label_in_popup">
                            <span class="card-sizes__label card-sizes__from-shop">
                              <span class="card-sizes__title">
                                L </span>
                            </span>

                            <div class="card-sizes__comment">подписка</div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div data-role="sizesinfo" data-model-id="_105590">
                  <div class="content">
                    <div class="table-wrapper" style="margin-bottom: 0; margin-left: 0; margin-right: 0">

                      <table>
                        <tbody>
                          <tr>
                            <th>Размер</th>
                            <th>Обхват груди, см</th>
                            <th>Обхват талии, см</th>
                            <th>Обхват бедер, см</th>
                          </tr>
                          <tr>
                            <td>XS</td>
                            <td>84</td>
                            <td>64</td>
                            <td>90</td>
                          </tr>
                          <tr>
                            <td>S</td>
                            <td>88</td>
                            <td>68</td>
                            <td>94</td>
                          </tr>
                          <tr>
                            <td>M</td>
                            <td>92</td>
                            <td>74</td>
                            <td>100</td>
                          </tr>
                          <tr>
                            <td>L</td>
                            <td>96</td>
                            <td>78</td>
                            <td>104</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="catalog-list__item updated" data-key="105590" data-size="125391">
                <a href="/catalog/verhnaa-odezda/puhovik-korotkij-107123" class="catalog-list__link lookbook-link">
                </a>
                <div class="catalog-list__preview"><a href="/catalog/verhnaa-odezda/puhovik-korotkij-107123" class="catalog-list__link lookbook-link">
                    <img src="/uploads/gallery/5952ac943322be6cb6953f71a0c024b5.jpg" alt="" class="catalog-list__image">
                  </a>
                  <div class="card-speed-buy"><a href="/catalog/verhnaa-odezda/puhovik-korotkij-107123" class="catalog-list__link lookbook-link">
                    </a>
                    <div class="card-speed-buy__info"><a href="/catalog/verhnaa-odezda/puhovik-korotkij-107123" class="catalog-list__link lookbook-link">
                      </a>
                      <div class="card-sizes"><a href="/catalog/verhnaa-odezda/puhovik-korotkij-107123" class="catalog-list__link lookbook-link">
                          <div class="card-sizes__list">
                            <div class="card-sizes__item">
                              <input data-model-id="_105590" type="radio" name="sizes[105590]" id="s125393" value="125393" class="card-sizes__input" data-url="/cart/add-item/125393/1">
                              <label for="s125393" href="/catalog/item-subscribe/125393" class="card-sizes__label-wrap ">
                                <span class="card-sizes__label ">
                                  <span class="card-sizes__title">
                                    XS </span>
                                </span>

                              </label>
                            </div>
                            <div class="card-sizes__item">
                              <input data-model-id="_105590" type="radio" name="sizes[105590]" id="s125392" value="125392" class="card-sizes__input" data-url="/cart/add-item/125392/1">
                              <label for="s125392" href="/catalog/item-subscribe/125392" class="card-sizes__label-wrap ">
                                <span class="card-sizes__label ">
                                  <span class="card-sizes__title">
                                    S </span>
                                </span>

                              </label>
                            </div>
                            <div class="card-sizes__item">
                              <input data-model-id="_105590" type="radio" name="sizes[105590]" id="s125391" value="125391" class="card-sizes__input" data-url="/cart/add-item/125391/1" checked="checked">
                              <label for="s125391" href="/catalog/item-subscribe/125391" class="card-sizes__label-wrap ">
                                <span class="card-sizes__label ">
                                  <span class="card-sizes__title">
                                    M </span>
                                </span>

                              </label>
                            </div>
                            <div class="card-sizes__item">
                              <input data-model-id="_105590" type="radio" name="sizes[105590]" id="s125390" value="125390" class="card-sizes__input" data-url="/cart/add-item/125390/1" disabled="disabled">
                              <label for="s125390" href="/catalog/item-stocks/125390" class="card-sizes__label-wrap js-popup-subscribe">
                                <span class="card-sizes__label card-sizes__from-shop">
                                  <span class="card-sizes__title">
                                    L </span>
                                </span>

                                <div class="card-sizes__comment">подписка</div>
                              </label>
                            </div>
                          </div>
                        </a><a href="#" class="card-sizes__guide">справочник по размерам</a>
                      </div>
                      <div class="card__button-wrapper">
                        <button href="#sizes-_105590" data-model-id="_105590" type="button" class="button button_powdery card__button buy_button js-card-button" style="visibility: visible; opacity: 1;"><span class="card__button-text">Добавить в корзину</span></button>
                      </div>
                      <div class="card-wish card__wish">
                        <input data-model="105590" data-model-id="_105590" id="wish-_105590" type="checkbox" class="card-wish__input wishlist-checkbox" checked="checked">
                        <label for="wish-_105590" class="card-wish__label">
                          <i class="card-wish__icon"></i><span class="card-wish__text">Убрать из Wishlist'а</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <span class="catalog-list__fav catalog-list__fav__in"></span>
                </div>

                <div class="catalog-list__box">

                  <div class="catalog-list__info catalog-list__info_head">




                    <div class="catalog-list__tag catalog-list__new">New</div>

                  </div>

                  <!-- Заголовок товара -->
                  <div class="catalog-list__title">
                    <div class="catalog-list__title-inn">
                      <span>Юбка</span>
                    </div>
                  </div>
                  <!-- Заголовок товара END -->

                  <!-- Цена и скидка товара -->
                  <div class="catalog-list__price">
                    560 {{__('userpanel.currency')}} </div>
                  <!-- Цена и скидка товара END -->
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
<script src="{{asset('assets/js/jquery.pjax.js')}}"></script>
<script src="{{asset('assets/js/chunks/vendor.js')}}"></script>
<script src="{{asset('assets/js/chunks/layout-base.js')}}"></script>
<script src="{{asset('assets/js/whishlist/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>
<script src="{{asset('assets/js/home/scripts.js')}}"></script>
@endsection

@section('head')
<title>Интернет-магазин детской одежды - Дом на дереве</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
<meta name="description" content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
<link rel="stylesheet" href="{{asset('assets/js/wishlist/styles.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fast-catalog-item/styles.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
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