@extends('user.layouts.main')

@section('content')
    <div style="display: none">
      <div id="add_item" class="popup popupify-inner">
          <h4 class="popupify-inner__title">
              <span class="popupify-inner__title-a">
                  Спасибо! </span>
              <span class="popupify-inner__title-b">
                  Товар у вас в корзине! </span>
          </h4>

          <div class="popupify-inner__thanks-a">
              <p>Товар успешно добавлен в корзину.</p>
          </div>
          <div class="popupify-inner__thanks-b">
              <p>Пожалуйста, учтите: при добавлении в корзину товары не бронируются.</p>
              <p class="popupify-inner__thanks-b-copies">У нас осталось <span class="copies">3 экземпляра</span> этого
                  размера.</p>
          </div>

          <a href="/cart" class="popupify__button popupify__button--fix" data-ga-category="Checkout"
              data-ga-action="Checkout click popup" data-ga-label="Пользователь залогинен">
              Оформить заказ </a>

          <div class="login__recover">
              <a href="#" class="login__recover-link login__recover-link--redesign">Продолжить покупки</a>
          </div>
      </div>

      <div id="add_item-error" class="popup popupify-inner">
          <h4 class="popupify-inner__title">
              Ошибка! </h4>
          <p>
              К сожалению товара нет в наличии. </p>

          <div class="login__recover">
              <a href="#" class="login__recover-link login__recover-link--redesign">
                  Ок </a>
          </div>
      </div>

      <div id="add_item-error-unauthenticated" class="popup popupify-inner">
          <h4 class="popupify-inner__title">
              Ошибка! </h4>
          <p>
              Для добавления позиции в корзину необходимо необходимо авторизоваться или зарегистрироваться.</p>

          <div class="login__recover">
              <a href="#" class="login__recover-link login__recover-link--redesign">
                  Ок </a>
          </div>
      </div>

      <div id="add_item-error-size-not-founded" class="popup popupify-inner">
          <h4 class="popupify-inner__title">
              Ошибка! </h4>
          <p>
              Выберите размер. </p>

          <div class="login__recover">
              <a href="#" class="login__recover-link login__recover-link--redesign">
                  Ок </a>
          </div>
      </div>

      <div id="add_item-error-client-null" class="popup popupify-inner">
          <h4 class="popupify-inner__title">
              Ошибка! </h4>
          <p>
              Для добавления позиции в wishlist необходимо авторизоваться или зарегистрироваться.</p>

          <div class="login__recover">
              <a href="#" class="login__recover-link login__recover-link--redesign">
                  Ок </a>
          </div>
      </div>
    </div>
    <div class="lookbook">
        <div class="lookbook__holder">
            <div class="lookbook__row">
                <div class="lookbook__sidebar">
                    <div data-holder=".lookbook__row" class="lookbook__sidebar-holder js-sticky-sidebar"
                        style="position: fixed; top: 64px;">
                        <a href="{{ route('user.lookbooks') }}" class="page-back">
                            <div class="page-back__holder"><i class="page-back__icon"></i><span
                                    class="page-back__text"></span>Коллекции</div>
                        </a>
                        <a href="{{ route('user.lookbooks-allwear', $lookbook->id) }}"
                            class="lookbook__more-link">посмотреть все</a>
                    </div>
                </div>

                <div class="lookbook__content">
                    <div class="lookbook-grid js-lookbook-grid lookbook__grid">
                        <div class="lookbook-grid__list">
                            <div class="lookbook-grid__field">
                                @foreach ($lookbook->banners->sortBy('sort_order') as $banner)
                                <div class="collapse-wrapper">
                                    <div class="lookbook-grid__item w-50 js-lookbook-item lookbook-grid__item collapsible">
                                        <div class="lookbook-grid__inner">
                                            <div class="lookbook-grid__image-wrapper" style="padding-top: 125%;">
                                                <img class="lookbook-grid__image"src="{{asset($banner->img_path)}}">
                                            </div>
                                        </div>

                                        <div class="lookbook-content">
                                            <div style="text-align: center;" class="lookbook-content__text">
                                                <a href="#" class="lookbook-content__link_sm">Посмотреть</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="lookbook-grid__item w-50 js-lookbook-item collapsible">
                                        <div class="lookbook-grid__inner">
                                            <div class="lookbook-grid__image-wrapper" style="padding-top: 125%;">
                                                <img class="lookbook-grid__image" src="{{asset($banner->img_path_2)}}">
                                            </div>
                                        </div>

                                        <div class="lookbook-content">
                                            <div style="text-align: center;" class="lookbook-content__text">
                                                <a href="#" class="lookbook-content__link_sm">Посмотреть</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lookbook-products products-collapsed-content">
                                        <div class="lookbook-products__list">
                                            <div class="lookbook-products__close"></div>
                                            <div class="lookbook-products__inner">
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
                                                          @foreach ($banner->colorVariations as $wishlist_item)
                                                              <div class="catalog-list__item updated color_variation_item"
                                                                  product-key="{{ $wishlist_item->id }}">
                                                                  <a href="{{ route('user.product', [
                              'product' => $wishlist_item->product->slug,
                              'color' => $wishlist_item->color->slug,
                          ]) }}"
                                                                      class="catalog-list__link lookbook-link">
                                                                  </a>
                                                                  <div class="catalog-list__preview"><a
                                                                          href="{{ route('user.product', [
                              'product' => $wishlist_item->product->slug,
                              'color' => $wishlist_item->color->slug,
                          ]) }}"
                                                                          class="catalog-list__link lookbook-link">
                                                                          <div class="catalog-list__image-container">
                                                                              <img class="catalog-list__image loading loaded"
                                                                                  src="{{ asset($wishlist_item->main_img) }}" alt="
                                                                                          {{ $wishlist_item->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} 
                                                                                          @if ($wishlist_item->color_id !==
                                                                              76) {{ $wishlist_item->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} @endif">
                                                                          </div>
                                                                      </a>
                                                                      <div class="card-speed-buy"><a
                                                                              href="{{ route('user.product', [
                              'product' => $wishlist_item->product->slug,
                              'color' => $wishlist_item->color->slug,
                          ]) }}"
                                                                              class="catalog-list__link lookbook-link">
                                                                          </a>
                                                                          <div class="card-speed-buy__info"><a
                                                                                  href="{{ route('user.product', [
                              'product' => $wishlist_item->product->slug,
                              'color' => $wishlist_item->color->slug,
                          ]) }}"
                                                                                  class="catalog-list__link lookbook-link">
                                                                              </a>
                                                                              <div class="card-sizes"><a
                                                                                      href="{{ route('user.product', [
                              'product' => $wishlist_item->product->slug,
                              'color' => $wishlist_item->color->slug,
                          ]) }}"
                                                                                      class="catalog-list__link lookbook-link">
                                                                                      <div class="card-sizes__list">
                                                                                          @foreach ($wishlist_item->sizeVariations as $sizeVariation)
                                                                                              @if ($sizeVariation->stock > 0)
                                                                                                  <div class="card-sizes__item">
                                                                                                      <input data-size="{{ $sizeVariation->id }}"
                                                                                                          type="radio"
                                                                                                          name="size_variation_id[{{ $sizeVariation->id }}]"
                                                                                                          id="size_variation_{{ $sizeVariation->id }}"
                                                                                                          value="size_variation_{{ $sizeVariation->id }}"
                                                                                                          class="card-sizes__input">
                                                                                                      <label
                                                                                                          for="size_variation_{{ $sizeVariation->id }}"
                                                                                                          href="#" class="card-sizes__label-wrap ">
                                                                                                          <span
                                                                                                              class="card-sizes__label js-label_in_popup">
                                                                                                              <span class="card-sizes__title">
                                                                                                                  {{ $sizeVariation->size->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                                                              </span>
                                                                                                          </span>
                          
                                                                                                          <div class="card-sizes__comment">
                          
                                                                                                              @if ($sizeVariation->stock < 4)
                                                                                                                  Мало
                                                                                                              @endif
                                                                                                          </div>
                                                                                                      </label>
                                                                                                  </div>
                                                                                              @endif
                                                                                          @endforeach
                                                                                      </div>
                                                                                  </a><a href="#" class="card-sizes__guide">справочник по размерам</a>
                                                                              </div>
                                                                              @if ($wishlist_item->hasSizesInStock())
                                                                                  <div class="card__button-wrapper">
                                                                                      <button href="#sizes-{{ $wishlist_item->id }}_105669"
                                                                                          data-model-id="{{ $wishlist_item->id }}_105669"
                                                                                          type="button"
                                                                                          class="button button_powdery card__button buy_button js-card-button"
                                                                                          style="visibility: visible; opacity: 1;"
                                                                                          {{-- onclick="addToCartAjax(event)" --}}
                                                                                          data-color_variation="{{ $wishlist_item->color->id }}"
                                                                                          data-product="{{ $wishlist_item->product->id }}">
                                                                                          Добавить в корзину </button>
                                                                                  </div>
                                                                              @endif
                                                                              <div class="card-wish card__wish">
                                                                                  <input data-model="{{ $wishlist_item->id }}"
                                                                                      data-model-id="{{ $wishlist_item->id }}_105669"
                                                                                      id="wish-{{ $wishlist_item->id }}_105669"
                                                                                      color-variation-id="{{ $wishlist_item->id }}" type="checkbox"
                                                                                      class="card-wish__input wishlist-checkbox" checked="checked">
                                                                                  <label for="wish-{{ $wishlist_item->id }}_105669"
                                                                                      class="card-wish__label">
                                                                                      <i class="card-wish__icon"></i><span
                                                                                          class="card-wish__text">Убрать
                                                                                          из Wishlist'а</span>
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                          
                                                                  </div>
                          
                                                                  <div class="catalog-list__box">
                          
                                                                      <div class="catalog-list__info catalog-list__info_head">
                          
                          
                          
                          
                          
                                                                      </div>
                          
                                                                      <!-- Заголовок товара -->
                                                                      <div class="catalog-list__title">
                                                                          <div class="catalog-list__title-inn">
                                                                              <span>{{ $wishlist_item->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                                  @if ($wishlist_item->color->id !== 76)
                                                                                      {{ $wishlist_item->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                                  @endif
                                                                              </span>
                                                                          </div>
                                                                      </div>
                                                                      <!-- Заголовок товара END -->
                          
                                                                      <!-- Цена и скидка товара -->
                                                                      <div class="catalog-list__price">
                                                                          @if ($wishlist_item->sizeVariations->sortBy('price')->first()->price == $wishlist_item->sizeVariations->sortByDesc('price')->first()->price)
                                                                              {{ $wishlist_item->sizeVariations->sortBy('price')->first()->price }}
                                                                          @else
                                                                              {{ $wishlist_item->sizeVariations->sortBy('price')->first()->price }}
                                                                              -
                                                                              {{ $wishlist_item->sizeVariations->sortByDesc('price')->first()->price }}
                                                                          @endif {{ __('userpanel.currency') }}
                                                                      </div>
                                                                      <!-- Цена и скидка товара END -->
                                                                  </div>
                          
                                                              </div>
                                                          @endforeach
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach




                            </div>
                        </div>

                        <a href="/lookbook/all-wear/154" class="button button_transparent lookbook-grid__more-button">
                            <span class="link">посмотреть все</span>
                        </a>
                    </div>
                </div>

                {{-- <div class="share"><a href="#" class="share__open js-open-share">Поделиться</a>
        <ul class="share__list" style="display: none;">
                              <li class="share__item">
            <a target="_blank" onclick="window.open(this.href, 'newwindow', 'width=500, height=350'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F12storeez.com%2Flookbook%2Fitem%2F154" class="share__link">Facebook</a>
          </li>
          <li class="share__item">
            <a target="_blank" onclick="window.open(this.href, 'newwindow', 'width=500, height=350'); return false;" href="https://twitter.com/home?status=https%3A%2F%2F12storeez.com%2Flookbook%2Fitem%2F154" class="share__link">Twitter</a>
          </li>
          <li class="share__item">
            <a target="_blank" onclick="window.open(this.href, 'newwindow', 'width=500, height=350'); return false;" href="https://vk.com/share.php?url=https%3A%2F%2F12storeez.com%2Flookbook%2Fitem%2F154" class="share__link">Vk</a>
          </li>
          <li class="share__item">
            <a target="_blank" onclick="window.open(this.href, 'newwindow', 'width=500, height=350'); return false;" href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2F12storeez.com%2Flookbook%2Fitem%2F154&amp;media=https%3A%2F%2Fimage.12storeez.com%2Fuploads%2Fimages%2Fslider%2F07.03.2018%2F60b49684694cb-imgonline-com-ua-2to1-48zrbfkhyjcy7khq.jpg&amp;description=%D0%92+%D1%81%D0%B2%D0%BE%D1%91%D0%BC+%D1%82%D0%B5%D0%BC%D0%BF%D0%B5" class="share__link">Pinterest</a>
          </li>
        </ul>
      </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/lookbook-item/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>


    <script>
      
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                var content = $(this).closest('.collapse-wrapper').find('.products-collapsed-content')[0]
                console.log(content)
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        var close = document.getElementsByClassName("lookbook-products__close");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].addEventListener("click", function() {
                var content = $(this).closest('.collapse-wrapper').find('.products-collapsed-content')[0]
                console.log(content)
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        $('body').on('click', '.card-wish__input', function(e) {
            addToWishList(e)
        })

        function addToWishList(event) {
            var clientId = {{ Auth::user() == null ? null : Auth::user()->id }}
            console.log(clientId)
            console.log(event.target)
            if (clientId == null) {
                new window.basePopup({
                    context: {
                        content: document.querySelector("#add_item-error-client-null").outerHTML
                    },
                    onOpened: function() {
                        var e = this;
                        $(".login__recover-link").off("click").on("click", (function(t) {
                            t.preventDefault(), e.close()
                        }))
                    }
                })
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/add-to-wishlist') }}",
                type: "post",
                data: {
                    color_variation_id: $(event.target).attr('color-variation-id'),
                    // size_id: $(event.target).attr('size-id'),
                    user_id: clientId,
                },
                success: function(response) {
                    console.log(response)
                    var wishlistCount = document.getElementById('wishlist-count')
                    if (response > 0) {
                        wishlistCount.style.display = "block"
                    } else {
                        wishlistCount.style.display = "none"
                    }

                    if (wishlistCount.innerHTML < response) {
                        $(event.target).closest('div').find('span')[0].innerText = "Убрать из Wishlist'а"
                    } else {
                        $(event.target).closest('div').find('span')[0].innerText = "Добавить в Wishlist"
                    }
                    wishlistCount.innerHTML = response
                }
            })
        }

        $('.js-card-button').click(function(){

            var itemBlock = $(this).closest('.catalog-list__item')
            var dataSize = 999999999
            itemBlock.find('.card-sizes__input').each(function(e){
                if($(this).is(':checked')) {
                    dataSize = $(this).attr('data-size')
                }
            })
            
            if (dataSize == 999999999) {
                new window.basePopup({
                    context: {
                        content: document.querySelector("#add_item-error-size-not-founded").outerHTML
                    },
                    onOpened: function() {
                        var e = this;
                        $(".login__recover-link").off("click").on("click", (function(t) {
                            t.preventDefault(), e.close()
                        }))
                    }
                })

                return
            }

            var dataColor = $(this).attr('data-color_variation')
            var dataProduct = $(this).attr('data-product')
            var qty = 1

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/card/add') }}",
                type: "post",
                data: {
                    size_variation_id: dataSize,
                    qty: qty,
                    product_id: dataProduct,
                    color_id: dataColor,
                },
                success: function(response) {
                    console.log(response)
                    new window.basePopup({
                        context: {
                            content: document.querySelector("#add_item").outerHTML
                        },
                        onOpened: function() {
                            var e, t = this;
                            if ($(".login__recover-link").on("click", (function(e) {
                                    e.preventDefault(), t.close()
                                })), o < 10 && $(".thanks-popup-ab").length > 0) {
                                var n = ["one", "some", "many"][(e = o) % 100 > 4 && e % 100 < 20 ?
                                        2 : [2, 0, 1, 1, 1, 2][e % 10 < 5 ? e % 10 : 5]
                                    ],
                                    i = $(".thanks-popup-ab__locale-".concat(n)).val();
                                $(".popupify-inner__thanks-b-copies").show().find(".copies")[1]
                                    .innerText = "".concat(o, " ").concat(i)
                            }
                        },
                        onClosed: function() {
                            $(".popupify-inner__thanks-b-copies").hide()
                        }
                    })
                },
                error: function(response) {
                    console.log(response)
                    new window.basePopup({
                        context: {
                            content: document.querySelector("#add_item-error").outerHTML
                        },
                        onOpened: function() {
                            var e = this;
                            $(".login__recover-link").off("click").on("click", (function(t) {
                                t.preventDefault(), e.close()
                            }))
                        }
                    })
                }
            })
        })

        $('.card-sizes__item').click(function() {
            $(this).closest('.card-sizes__list').find('.card-sizes__item').each(function(e) {
                $(this).find('.card-sizes__input').each(function(i) {
                    $(this).prop("checked", false)
                })
            })

            $(this).find('.card-sizes__input').each(function(i) {
                $(this).prop("checked", true)
            })
        })
    </script>
@endsection

@section('head')
    <title>Лукбук {{ $lookbook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} в интернет-магазине — Дом на
        дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Лукбук {{ $lookbook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} в Дом на дереве">
    <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <style>
        .reviews__review {
            margin-bottom: 1.2rem;
        }

        .reviews__review-text {
            width: auto;
        }

        .reviews__review-head {
            margin-bottom: 0;
        }

        .reviews__review-author {
            padding-left: 0;
        }

        .reviews__review-author>div {
            display: inline-block;
            width: auto;
            text-transform: none;
        }

        .reviews__review-rate {
            top: 0.1rem;
            width: auto;
        }

        .reviews__review-rate>div {
            display: inline-block;
            width: auto;
        }

        .reviews__review-rate-num {
            font-size: .85714rem;
        }

        .reviews__review-text {
            padding: 0.7rem;
        }

        .reviews__review-text-triangle {
            top: -0.55rem;
            left: 1rem;
        }

        .reviews__review-text-triangle:after {
            background: #fff;
            -webkit-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            transform: rotate(225deg);
            top: 0;
        }

        @media screen and (min-width: 1024px) {
            .reviews__review-text-triangle:after {
                background: #fbfbfc;
            }
        }

        .reviews__review-time {
            font-size: .85714rem;
        }

        .card-features__title-nocaps {
            text-transform: none;
        }

        .card-features__title-caps {
            text-transform: uppercase;
        }

        .card-more {
            margin: 0 0 0.6rem 0;
            border-bottom: 1px solid !important;
        }

        .card-new-element {
            display: none;
        }

        .review-answer {
            background: #f1f2f5;
            margin-top: 37px;
        }

        .review-answer .reviews__review-text-triangle {
            left: auto;
            right: 0.55rem;
        }

        .review-answer .reviews__review-text-triangle:after {
            background: #f1f2f5;
        }

        .reviews__review-reply-toggle {
            font-size: .85714rem;
            margin: 5px 0 10px 0;
        }

        .card-features__text:after {
            content: '';
            display: block;
            clear: both;
        }

        .card__description-holder img.findsize {
            max-width: 100%;
            max-height: 100%;
        }

        @media screen and (max-width: 1024px) {
            .reviews__review-text {
                margin-bottom: 0;
            }
        }

        .card-info__sale {
            display: inline-block;
            margin: 0;
        }

        .card-info__sale .card-info__tag {
            background: none;
            color: #ccb5a2;
            padding: 0;
            font-size: 12px;
        }

        .card-info__price_old {
            text-decoration: line-through;
        }

        .ab-hide-more {
            display: block;
        }

        .ab-hide-more-btn {
            display: none;
        }

        @media screen and (max-width: 1023px) {
            body.ab-hide-more-item .ab-hide-more {
                display: none;
            }

            body.ab-hide-more-item .ab-hide-more-btn {
                display: block;
                padding: 100px 1rem 1rem 1rem;
                background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
                margin-top: -90px;
            }

            body.ab-hide-more-item .ab-hide-more-btn .button {
                border-color: #c5a995;
                color: #c5a995;
            }
        }

        .products-collapsed-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
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
    <html lang="ru-RU" class="t-card page-product__html">
@endsection
