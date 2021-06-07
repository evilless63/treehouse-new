@extends('user.layouts.main')

@section('content')
    <div class="catalog">
        <div class="catalog__holder">
            <div class="page__row">


                @include('user.includes.profile-nav')

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
                                @foreach($wishlist as $wishlist_item)
                                <div class="catalog-list__item updated color_variation_item" product-key="{{$wishlist_item->id}}">
                                    <a href="{{route('user.product', [
                                      'product' => $wishlist_item->product->slug,
                                      'color' => $wishlist_item->color->slug,
                                      ])}}"
                                        class="catalog-list__link lookbook-link">
                                    </a>
                                    <div class="catalog-list__preview"><a href="{{route('user.product', [
                                      'product' => $wishlist_item->product->slug,
                                      'color' => $wishlist_item->color->slug,
                                      ])}}"
                                            class="catalog-list__link lookbook-link">
                                            <div class="catalog-list__image-container">
                                                <img class="catalog-list__image loading loaded"
                                                    src="{{asset($wishlist_item->main_img)}}"
                                                    alt="{{$wishlist_item->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}} {{$wishlist_item->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}">
                                            </div>
                                        </a>
                                        <div class="card-speed-buy"><a href="{{route('user.product', [
                                          'product' => $wishlist_item->product->slug,
                                          'color' => $wishlist_item->color->slug,
                                          ])}}"
                                                class="catalog-list__link lookbook-link">
                                            </a>
                                            <div class="card-speed-buy__info"><a
                                                    href="{{route('user.product', [
                                                      'product' => $wishlist_item->product->slug,
                                                      'color' => $wishlist_item->color->slug,
                                                      ])}}"
                                                    class="catalog-list__link lookbook-link">
                                                </a>
                                                <div class="card-sizes"><a href="{{route('user.product', [
                                                  'product' => $wishlist_item->product->slug,
                                                  'color' => $wishlist_item->color->slug,
                                                  ])}}"
                                                        class="catalog-list__link lookbook-link">
                                                        <div class="card-sizes__list">
                                                            @foreach($wishlist_item->sizeVariations as $sizeVariation)
                                                              @if($sizeVariation->stock > 0 )
                                                              <div class="card-sizes__item">
                                                                  <input size_variation_id="{{$sizeVariation->id}}" type="radio"
                                                                      name="size_variation_id[{{$sizeVariation->id}}]" id="size_variation_{{$sizeVariation->id}}" value="size_variation_{{$sizeVariation->id}}"
                                                                      class="card-sizes__input">
                                                                  <label for="size_variation_{{$sizeVariation->id}}"
                                                                      href="#"
                                                                      class="card-sizes__label-wrap ">
                                                                      <span class="card-sizes__label ">
                                                                          <span class="card-sizes__title">
                                                                              {{$sizeVariation->size->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}} </span>
                                                                      </span>

                                                                      <div class="card-sizes__comment">

                                                                        @if($sizeVariation->stock > 10 ) 
                                                                          Много
                                                                        @else
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
                                                @if($wishlist_item->inStock())
                                                <div class="card__button-wrapper">
                                                    <button href="#sizes-1503358_105669" data-model-id="1503358_105669"
                                                        type="button"
                                                        class="button button_powdery card__button buy_button js-card-button"
                                                        style="visibility: visible; opacity: 1;"
                                                        onclick="addToCartAjax(event)"
                                                        data-color_variation = "{{$wishlist_item->id}}"
                                                        data-product = "{{$wishlist_item->product->id}}">
                                                        Добавить в корзину </button>
                                                </div>
                                                @endif
                                                <div class="card-wish card__wish">
                                                    <input data-model="105669" data-model-id="1503358_105669"
                                                        id="wish-1503358_105669" type="checkbox"
                                                        class="card-wish__input wishlist-checkbox" checked="checked">
                                                    <label for="wish-1503358_105669" class="card-wish__label">
                                                        <i class="card-wish__icon"></i><span class="card-wish__text">Убрать
                                                            из Wishlist'а</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="catalog-list__fav catalog-list__fav__in"></span>
                                    </div>

                                    <div class="catalog-list__box">

                                        <div class="catalog-list__info catalog-list__info_head">





                                        </div>

                                        <!-- Заголовок товара -->
                                        <div class="catalog-list__title">
                                            <div class="catalog-list__title-inn">
                                                <span>{{$wishlist_item->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}} {{$wishlist_item->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span>
                                            </div>
                                        </div>
                                        <!-- Заголовок товара END -->

                                        <!-- Цена и скидка товара -->
                                        <div class="catalog-list__price">
                                          @if($wishlist_item->sizeVariations->sortBy('price')->first()->price == $wishlist_item->sizeVariations->sortByDesc('price')->first()->price)
                                          {{$wishlist_item->sizeVariations->sortBy('price')->first()->price}}
                                          @else
                                          {{$wishlist_item->sizeVariations->sortBy('price')->first()->price}} - {{$wishlist_item->sizeVariations->sortByDesc('price')->first()->price}}
                                          @endif {{__('userpanel.currency')}}
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
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.infinitescroll.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/whishlist/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/home/scripts.js') }}"></script>

    <script>
      function changeColorVariationSelected(event) {
        var dataSize = event.target.getAttribute('data-id')
        console.log(dataSize)
        var sizetitles = document.getElementsByClassName('sizes-selector__title')
        console.log(sizetitles)
        sizetitles.forEach(function(item, i, arr) {
          item.setAttribute('data-size', dataSize)
        })
      }
    
      $('body').on('click', '.js-add-fav', function(e){
        e.preventDefault()
        e.stopPropagation()
        addToWishList(e)
        $(".js-rem-fav", $(e.target).closest(".catalog-list__link")).show(), $(".js-add-fav", $(e.target).closest(".catalog-list__link")).hide()       
      })
    
      $('body').on('click', '.js-rem-fav', function(e){
        e.preventDefault()
        e.stopPropagation()
        addToWishList(e)
        $(".js-add-fav", $(e.target).closest(".catalog-list__link")).show(), $(".js-rem-fav", $(e.target).closest(".catalog-list__link")).hide()
      })
    
      function addToWishList(event){
        var clientId = {{Auth::user() == null ? null : Auth::user()->id}}
        console.log(clientId)
        console.log(event.target)
        if(clientId == null) {
          new window.basePopup({
                context: {
                    content: document.querySelector("#add_item-error-client-null").outerHTML
                },
                onOpened: function () {
                    var e = this;
                    $(".login__recover-link").off("click").on("click", (function (t) {
                        t.preventDefault(), e.close()
                    }))
                }
            })
        }
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/add-to-wishlist')}}",
            type: "post",
            data: {
              color_variation_id: $(event.target).attr('color-variation-id'),
              // size_id: $(event.target).attr('size-id'),
              user_id: clientId,
            },
        })
      }
    
      function addToCartAjax(event) {
    
          var dataSize = 999999999
          sizetitles = document.getElementsByClassName('sizes-selector__title')
          sizetitles.forEach(function(item, i, arr) {
            console.log(item.getAttribute('data-size'))
            dataSize = item.getAttribute('data-size')
          })
    
          if (dataSize == 999999999) {
            new window.basePopup({
                  context: {
                      content: document.querySelector("#add_item-error-size-not-founded").outerHTML
                  },
                  onOpened: function () {
                      var e = this;
                      $(".login__recover-link").off("click").on("click", (function (t) {
                          t.preventDefault(), e.close()
                      }))
                  }
              })
    
              return
          }
    
          var dataColor = $(event.target).attr('data-color_variation')
          var dataProduct = $(event.target).attr('data-product')
          var qty = 1
    
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/card/add')}}",
            type: "post",
            data: {
              size_variation_id: dataSize,
              qty: qty,
              product_id: dataProduct,
              color_id: dataColor,
            },
            success: function(response) {
              document.getElementById('AddToCartButton').style.display = "none"
              document.getElementById('goToCartAfterAdded').style.display = "block"
    
              new window.basePopup({
                context: {
                    content: document.querySelector("#add_item").outerHTML
                },
                onOpened: function () {
                    var e, t = this;
                    if ($(".login__recover-link").on("click", (function (e) {
                            e.preventDefault(), t.close()
                        })), o < 10 && $(".thanks-popup-ab").length > 0) {
                        var n = ["one", "some", "many"][(e = o) % 100 > 4 && e % 100 < 20 ? 2 : [2, 0, 1, 1, 1, 2][e % 10 < 5 ? e % 10 : 5]],
                            i = $(".thanks-popup-ab__locale-".concat(n)).val();
                        $(".popupify-inner__thanks-b-copies").show().find(".copies")[1].innerText = "".concat(o, " ").concat(i)
                    }
                },
                onClosed: function () {
                    $(".popupify-inner__thanks-b-copies").hide()
                }
              })
            },
            error: function(response) {
              new window.basePopup({
                  context: {
                      content: document.querySelector("#add_item-error").outerHTML
                  },
                  onOpened: function () {
                      var e = this;
                      $(".login__recover-link").off("click").on("click", (function (t) {
                          t.preventDefault(), e.close()
                      }))
                  }
              })
            } 
          })
        }
    
    </script>
@endsection

@section('head')
    <title>Интернет-магазин детской одежды - Дом на дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
    <link rel="stylesheet" href="{{ asset('assets/js/wishlist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
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
