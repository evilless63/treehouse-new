@extends('user.layouts.main')

@section('content')
    <div style="display:none">
        <div id="add_item-error-client-null" class="popup popupify-inner">
            <h4 class="popupify-inner__title">
                Ошибка! </h4>
            <p>
                Для добавления позиции в wishlist необходимо авторизоваться или зарегистрироваться. </p>

            <div class="login__recover">
                <a href="#" class="login__recover-link login__recover-link--redesign">
                    Ок </a>
            </div>
        </div>
    </div>
    <div class="catalog">
        <div class="catalog__holder">
            <div class="page__row">
                <div class="page__sidebar page__sidebar_left js-fixed-block media-query-show_wide">
                    <div class="page__title">{{ __('userpanel.catalog') }}</div>
                    <div class="categories catalog__categories">
                        @include('user.includes.sidebar_categories', ['items'=>$categories_menu->roots()])
                        <!-- <div class="categories__item ">
                                                                  <a href="/catalog/skidki/mencollection" class="categories__link categories__link--red">Sale до
                                                                    -50%</a>
                                                                </div> -->
                    </div>
                </div>
                <div class="page__middle page__middle--catalog">
                    <div class="catalog__category-header">
                        <div class="catalog__category-title">{{ $category_name }}</div>

                        {{-- <div class="catalog__category-description">Сертифицированный хлопок, выращенный бережным способом
                            без пестицидов и химических удобрений: сохраняет чистоту воды и здоровье почвы, лучше для
                            фермеров </div> --}}
                    </div>
                    <div class="catalog-list ">
                        <div class="catalog-list__holder">


                            <div class="filter js-fixed-filter-block">
                                <div class="filter__top css-hide-mobile css-hide-tablet">
                                    <div class="filter__head">
                                        Выберите размер <span class="count" style="display: none;">2</span>
                                        <i class="arrow"></i>
                                    </div>
                                    <div class="filter__clear size" id="size-filter-reset" category-id="{{ $category->id }}">Сбросить</div>

                                </div>
                                <div class="filter__top filter__top--justify css-hide-desktop">
                                    <div class="filter__top-title">Новинки</div>
                                    <div class="filter__head filter__head--mobile">
                                        <div class="filter__head-icon">
                                            <span class="count count--mobile" style="display: none;">2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter__list">
                                    <div class="filter__item">
                                        <div class="filter__controls">

                                            @foreach ($sizes as $item)
                                                <div class="filter__field">
                                                    <div class="checkbox filter__checkbox"
                                                        data-available="{{ $item->id }}">
                                                        <input autocomplete="off" type="checkbox"
                                                            data-id="{{ $item->id }}"
                                                            data-filter="size={{ $item->id }}"
                                                            data-label="{{ $item->id }}"
                                                            data-hash="e7e2348470f3216841d083b92380e9d1"
                                                            name="{{ $item->id }}" id="{{ $item->id }}"
                                                            class="checkbox__input size-checkbox-filter">
                                                        <label for="{{ $item->id }}" class="checkbox__label"><span
                                                                class="checkbox__label-text">
                                                                {{ $item->getLocalizeShortTitle(LaravelLocalization::getCurrentLocale()) }}
                                                            </span></label>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="filter__field">
                                                <span class="filter-apply size-filter-apply"
                                                    data-ga-action="Apply filter click" category-id="{{ $category->id }}"
                                                    style="display: inline;">
                                                    Применить
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div id="catalog-grid">
                                @include('user.includes.catalog_grid', ['products_by_category'=>$products_by_category])
                            </div>
                        </div>



                        <!-- SITEDEV-2634 -->
                        <div class="card__item card__item_lastview card__item--slider">

                            <div class="card__item_head card__item_head--catalog">
                                <h2 class="card__title">{{ __('userpanel.you_recently_viewed') }}</h2>
                                <div class="card__item_controls card-item-controls last-view-controls">
                                    <div class="card-item-controls__prev"></div>
                                    <div class="card-item-controls__next"></div>
                                </div>
                            </div>
                            <div class="catalog-list card__might-like js-catalog-list-slider last-view-block"
                                data-controls="last-view-controls" data-location="catalog">
                                <div class="catalog-list__holder">
                                    <div class="catalog-list__row">
                                        @foreach ($recently_viewed_products as $recently_viewed_product)
                                            <div class="catalog-list__item last-view-item" data-id="105294">
                                                <a href="{{ route('user.product', [
    'product' => $recently_viewed_product->product->slug,
    'color' => $recently_viewed_product->color->slug,
]) }}"
                                                    class="catalog-list__link last-view-link" data-type="last_view"
                                                    data-id="105294" data-category="product_card"
                                                    data-action="recommendations" data-label="click_last_view">
                                                    <div class="catalog-list__preview catalog-list__preview--round">
                                                        <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $recently_viewed_product->id)->count() > 0) style="display:none" @endif
                                                            color-variation-id="{{ $recently_viewed_product->id }}"></span>
                                                        <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $recently_viewed_product->id)->count() == 0) style="display:none" @endif
                                                            color-variation-id="{{ $recently_viewed_product->id }}"></span>
                                                        <img src="{{ asset($recently_viewed_product->main_img()) }}"
                                                            alt="{{ $recently_viewed_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                            data-observer-src="{{ asset($recently_viewed_product->main_img()) }}"
                                                            class="catalog-list__image" />
                                                    </div>

                                                    <div class="catalog-list__box">

                                                        <div class="catalog-list__info catalog-list__info_head">





                                                        </div>

                                                        <!-- Заголовок товара -->
                                                        <div class="catalog-list__title">
                                                            <div class="catalog-list__title-inn">
                                                                <span>{{ $recently_viewed_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                    @if ($recently_viewed_product->color->id !== 76)
                                                                        {{ $recently_viewed_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- Заголовок товара END -->

                                                        <!-- Цена и скидка товара -->
                                                        <div class="catalog-list__price">
                                                            @if ($recently_viewed_product->sizeVariations->sortBy('price')->first()->price == $recently_viewed_product->sizeVariations->sortByDesc('price')->first()->price)
                                                                {{ $recently_viewed_product->sizeVariations->sortBy('price')->first()->price }}
                                                            @else
                                                                {{ $recently_viewed_product->sizeVariations->sortBy('price')->first()->price }}
                                                                -
                                                                {{ $recently_viewed_product->sizeVariations->sortByDesc('price')->first()->price }}
                                                            @endif {{ __('userpanel.currency') }}
                                                            <!-- <s class="catalog-list__price-old">19 980 {{ __('userpanel.currency') }}</s> -->
                                                        </div>
                                                        <!-- Цена и скидка товара END -->
                                                    </div>
                                                </a>

                                                <!-- Цвета -->
                                                <ul class="catalog-list__colors catalog-list-colors">
                                                    @foreach ($recently_viewed_product->product->colorVariations as $colorVariation)
                                                        <li class="catalog-list-colors__color "
                                                            title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                            style="background:{{ $colorVariation->color->hex }}">
                                                        </li>
                                                    @endforeach
                                                </ul>


                                                <!-- Цвета END -->

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($wishlist->count() > 0)
                            <div class="card__item card__item_wishlist">

                                <div class="card__item_head">
                                    <h2 class="card__title">Ваш вишлист</h2>
                                    <div class="card__item_controls card-item-controls wishlist-controls">
                                        <div class="card-item-controls__prev"></div>
                                        <div class="card-item-controls__next"></div>
                                    </div>
                                </div>
                                <div class="catalog-list card__might-like js-catalog-list-slider wishlist-block"
                                    data-controls="wishlist-controls">
                                    <div class="catalog-list__holder">
                                        <div class="catalog-list__row">
                                            @foreach ($wishlist as $wish_product)
                                                <div class="catalog-list__item accompaniment-item">

                                                    <a href="{{ route('user.product', [
    'product' => $wish_product->product->slug,
    'color' => $wish_product->color->slug,
]) }}"
                                                        class="catalog-list__link accompaniment-link">
                                                        <div class="catalog-list__preview catalog-list__preview--round">
                                                            <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $wish_product->id)->count() > 0) style="display:none" @endif
                                                                color-variation-id="{{ $wish_product->id }}"></span>
                                                            <span class="catalog-list__fav catalog-list__fav__in js-rem-fav"
                                                                @if ($wishlist->where('id', $wish_product->id)->count() == 0) style="display:none" @endif
                                                                color-variation-id="{{ $wish_product->id }}"></span>
                                                            <img src="{{ asset($wish_product->main_img) }}"
                                                                alt="{{ $wish_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} @if ($wish_product->color->id !== 76) {{ $wish_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }} @endif"
                                                            class="catalog-list__image" />
                                                        </div>

                                                        <div class="catalog-list__box">
                                                            <div class="catalog-list__info catalog-list__info_head">
                                                            </div>

                                                            <!-- Заголовок товара -->
                                                            <div class="catalog-list__title">
                                                                <div class="catalog-list__title-inn">
                                                                    <span>{{ $wish_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                        @if ($wish_product->color->id !== 76)
                                                                            {{ $wish_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- Заголовок товара END -->

                                                            <!-- Цена и скидка товара -->
                                                            <div class="catalog-list__price">
                                                                @if ($wish_product->sizeVariations->sortBy('price')->first()->price == $wish_product->sizeVariations->sortByDesc('price')->first()->price)
                                                                    {{ $wish_product->sizeVariations->sortBy('price')->first()->price }}
                                                                @else
                                                                    {{ $wish_product->sizeVariations->sortBy('price')->first()->price }}
                                                                    -
                                                                    {{ $wish_product->sizeVariations->sortByDesc('price')->first()->price }}
                                                                @endif
                                                                {{ __('userpanel.currency') }}
                                                            </div>
                                                            <!-- Цена и скидка товара END -->

                                                        </div>
                                                    </a>

                                                    <!-- Цвета -->
                                                    <ul class="catalog-list__colors catalog-list-colors">
                                                        <li class="catalog-list-colors__color "
                                                            title="{{ $wish_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                            style="background: {{ $wish_product->color->hex }}">
                                                        </li>
                                                    </ul>
                                                    <!-- Цвета END -->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- SITEDEV-2634 end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div style="display: none">
        <div id="load_items" class="popup popup_small">
            <div class="popup__holder">
                <p class="popup__head"></p>
                <div class="page-preloader preloader_active preloader_active_catalog">
                    <div class="page-preloader__loading"></div>
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
    <script src="{{ asset('assets/js/fast-catalog-item/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/home/scripts.js') }}"></script>

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

        $('body').on('click', '.filter__top', function(e) {
            $('.filter__list').each(function() {
                $(this).toggleClass('filter__list_visible')
            })
            $('.arrow').each(function() {
                $(this).toggleClass('toggled')
            })
        })

        var result = $('#catalog-grid');
        $('.size-filter-apply').on('click', function() {
            
            result.fadeOut( "slow" )
            var category_id = $(this).attr('category-id');
            var ids = []
            $('.size-checkbox-filter').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).attr('data-id'))
                }
            })
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/filter-by-size",
                data: {
                    'category_id': category_id,
                    'ids': ids.join(',')
                    
                },
                success: function(msg) {
                    result.html(msg)
                    result.fadeIn( "slow" )
                }
            });

        });

        $('#size-filter-reset').on('click', function() {
            result.fadeOut( "slow" )
            var category_id = $(this).attr('category-id');
            var ids = []
            $('.size-checkbox-filter').each(function() {
                ids.push($(this).attr('data-id'))
            })
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/filter-by-size",
                data: {
                    'category_id': category_id,
                    'ids': ids.join(',')
                },
                success: function(msg) {
                    result.html(msg)
                    result.fadeIn( "slow" )
                }
            });

        });

    </script>
@endsection

@section('head')
    <title>{{ $category_name }} в интернет-магазине — Дом на дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Большой выбор футболок и толстовок от 12 STOREEZ. Универсальные модели на каждый день">
    <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">


    <style>
        .search-result .search__input {
            width: 49%;
        }

    </style>
    <style>
        span.admin-only {
            color: red;
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
