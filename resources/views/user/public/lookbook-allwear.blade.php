@extends('user.layouts.main')

@section('content')
    <div class="catalog">
        <div class="catalog__holder">
            <div class="page__row">
                <div class="page__sidebar page__sidebar_left">
                    <a href="{{ route('user.lookbook', $lookbook->id) }}" class="lookbook-back">
                        <div class="page-back__holder"><i class="page-back__icon"></i><span
                                class="page-back__text">Назад</span> </div>
                    </a>
                </div>
                <div class="page__middle">
                    <div id="lookbook-list" class="catalog-list catalog-list_wrap catalog__list">
                        <div class="catalog-list__holder">
                            <div class="catalog-list__row">
                                @foreach ($banners as $item)
                                    @foreach ($item->colorVariations as $colorVariation)
                                    <div class="catalog-list__item" data-key="106346">
                                      <a href="
                                      {{ LaravelLocalization::localizeUrl(
                                        route('user.product', [
                                            'product' => $colorVariation->product->slug,
                                            'color' => $colorVariation->color->slug,
                                        ]),
                                      ) }}" class="catalog-list__link" data-pjax="0">
                                          <div class="catalog-list__preview">
                                              <div class="catalog-list__image-container">
                                                  <img class="catalog-list__image loading loaded"
                                                      src="{{ asset($colorVariation->main_img()) }}"
                                                      alt="{{ $colorVariation->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                                              </div>
                                              <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $colorVariation->id)->count() > 0) style="display:none" @endif
                                                color-variation-id="{{ $colorVariation->id }}"></span>
                                              <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $colorVariation->id)->count() == 0) style="display:none" @endif
                                                  color-variation-id="{{ $colorVariation->id }}"></span>
                                          </div>
                                      </a>
                                      <div class="catalog-list__box">
                                          <a id="106346" href="
                                          {{ LaravelLocalization::localizeUrl(
                                            route('user.product', [
                                                'product' => $colorVariation->product->slug,
                                                'color' => $colorVariation->color->slug,
                                            ]),
                                          ) }}" class="catalog-list__link">
  
                                              <!-- Заголовок товара -->
                                              <div class="catalog-list__title">
                                                  <div class="catalog-list__title-inn">
                                                      <span>{{ $colorVariation->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</span>
                                                  </div>
                                              </div>
                                              <!-- Заголовок товара END -->
  
                                              <!-- Цена и скидка товара -->
                                              <div class="catalog-list__price">
                                                @if ($colorVariation->sizeVariations->sortBy('price')->first()->price == $colorVariation->sizeVariations->sortByDesc('price')->first()->price)
                                                    {{ $colorVariation->sizeVariations->sortBy('price')->first()->price }}
                                                @else
                                                    {{ $colorVariation->sizeVariations->sortBy('price')->first()->price }} -
                                                    {{ $colorVariation->sizeVariations->sortByDesc('price')->first()->price }}
                                                @endif {{ __('userpanel.currency') }}
                                              </div>
                                              <!-- Цена и скидка товара END -->
                                          </a>
  
                                          <!-- Цвета -->
                                          <ul class="catalog-list__colors catalog-list-colors">
                                            @foreach ($colorVariation->product->colorVariations as $colorVariation)
                                                <li class="catalog-list-colors__color"
                                                    title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                    style="background:{{ $colorVariation->color->hex }}">
                                                </li>
                                            @endforeach
                                          </ul>
                                          <!-- Цвета END -->
                                      </div>
                                  </div> 
                                    @endforeach
                                @endforeach
                                

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
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/fast-catalog-item/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/base/scripts.js') }}"></script>


    <script>
        $('body').on('click', '.js-add-fav', function(e) {
            e.preventDefault()
            e.stopPropagation()
            addToWishList(e)
            $(".js-rem-fav", $(e.target).closest(".catalog-list__link")).show(), $(".js-add-fav", $(e.target)
                .closest(".catalog-list__link")).hide()
        })

        $('body').on('click', '.js-rem-fav', function(e) {
            e.preventDefault()
            e.stopPropagation()
            addToWishList(e)
            $(".js-add-fav", $(e.target).closest(".catalog-list__link")).show(), $(".js-rem-fav", $(e.target)
                .closest(".catalog-list__link")).hide()
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
                    wishlistCount.innerHTML = response
                }
            })
        }
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
    <meta name="Лукбук {{ $lookbook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} в Дом на дереве">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/base/styles.css') }}">
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
