@extends('user.layouts.main')

@section('content')
    <div class="slick-slider">
        @foreach ($sliders as $item)
            <div class="hero" data-id="48" data-title="Приветственный текст Дом на дереве (для акций и тд и тп)">
                <div class="hero__media hero__image-wrapper">

                    @if ($item->source_path !== null)
                        <video autoplay muted loop id="myVideo" style="width: 100%">
                            <source src="{{ asset($item->source_path) }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ asset($item->source_path_img) }}" style="width: 100%"
                            alt="{{ $item->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                    @endif
                </div>

                <a href="{{ LaravelLocalization::localizeUrl(url($item->link)) }}" class="hero__holder">
                    <span
                        class="hero__button">{{ $item->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</span>
                </a>
            </div>
        @endforeach
    </div>
    {{-- <div class="slider-news home-slider" data-name="Новое на этой неделе" data-ga-name="New this week"
        data-key="homeSliderNewOnWeek">
        <div class="slider-news__holder">
            <div class="slider-news__wrapper">
                <div class="slider-news__head">
                    <div class="slider-news__title">Новинки</div>
                    <div class="slider-news__controls"> <button type="button"
                            class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                            class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                </div>
                <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                    @foreach ($new_products as $new_product)

                        <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $new_product->product->slug,
        'color' => $new_product->color->slug,
    ]),
) }}"
                            class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                            data-id="105559">
                            <div class="catalog-list__preview">
                                <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $new_product->id)->count() > 0) style="display:none" @endif
                                    color-variation-id="{{ $new_product->id }}"></span>
                                <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $new_product->id)->count() == 0) style="display:none" @endif
                                    color-variation-id="{{ $new_product->id }}"></span>
                                <img src="{{ asset($new_product->main_img()) }}"
                                    data-observer-src="{{ asset($new_product->main_img()) }}"
                                    alt="{{ $new_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                    class="catalog-list__image" />
                                <div class="page-preloader__loading news-loader"></div>
                            </div>
                            <div class="catalog-list__box slider-news__box">

                                <div class="catalog-list__info catalog-list__info_head">




                                    <div class="catalog-list__tag catalog-list__new">New</div>

                                </div>

                                <!-- Заголовок товара -->
                                <div class="catalog-list__title">
                                    <div class="catalog-list__title-inn">
                                        <span>{{ $new_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                            @if ($new_product->color->id !== 76){{ $new_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}@endif</span>
                                    </div>
                                </div>
                                <!-- Заголовок товара END -->

                                <!-- Цена и скидка товара -->
                                <div class="catalog-list__price">
                                    @if ($new_product->sizeVariations->sortBy('price')->first()->price == $new_product->sizeVariations->sortByDesc('price')->first()->price)
                                        {{ $new_product->sizeVariations->sortBy('price')->first()->price }}
                                    @else
                                        {{ $new_product->sizeVariations->sortBy('price')->first()->price }} -
                                        {{ $new_product->sizeVariations->sortByDesc('price')->first()->price }}
                                    @endif {{ __('userpanel.currency') }}
                                </div>
                                <!-- Цена и скидка товара END -->

                                <!-- Цвета -->
                                <ul class="catalog-list__colors catalog-list-colors">
                                    @foreach ($new_product->product->colorVariations as $colorVariation)
                                        <li class="catalog-list-colors__color "
                                            title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                            style="background:{{ $colorVariation->color->hex }}">
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Цвета END -->
                            </div>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    @foreach ($categories->take(3) as $category)
        <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
            data-key="homeSliderBestsellers">
            <div class="slider-news__holder">
                <div class="slider-news__wrapper">
                    <div class="slider-news__head">
                        <a href="{{ LaravelLocalization::localizeUrl(route('user.category', $category->slug)) }}"
                            style="    color: #887568;text-decoration:none;"
                            class="slider-news__title">{{ $category->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        <div class="slider-news__controls"> <button type="button"
                                class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                                class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                    </div>
                    <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                        @foreach ($category->colorVariations()->take(10)->get()
        as $bestseller)
                            <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $bestseller->product->slug,
        'color' => $bestseller->color->slug,
    ]),
) }}"
                                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                                data-id="105546">
                                <div class="catalog-list__preview">
                                    <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $bestseller->id)->count() > 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $bestseller->id)->count() == 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <img src="{{ asset($bestseller->main_img()) }}"
                                        data-observer-src="{{ asset($bestseller->main_img()) }}"
                                        alt="{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                        class="catalog-list__image" />
                                    <div class="page-preloader__loading news-loader"></div>
                                </div>
                                <div class="catalog-list__box slider-news__box">

                                    <!-- Заголовок товара -->
                                    <div class="catalog-list__title">
                                        <div class="catalog-list__title-inn">
                                            <span>{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @if ($bestseller->color->id !== 76)
                                                    {{ $bestseller->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Заголовок товара END -->

                                    <!-- Цена и скидка товара -->
                                    <div class="catalog-list__price">
                                        @if ($bestseller->sizeVariations->sortBy('price')->first()->price == $bestseller->sizeVariations->sortByDesc('price')->first()->price)
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }}
                                        @else
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }} -
                                            {{ $bestseller->sizeVariations->sortByDesc('price')->first()->price }}
                                        @endif {{ __('userpanel.currency') }}
                                    </div>
                                    <!-- Цена и скидка товара END -->

                                    <!-- Цвета -->
                                    <ul class="catalog-list__colors catalog-list-colors">
                                        @foreach ($bestseller->product->colorVariations as $colorVariation)
                                            <li class="catalog-list-colors__color "
                                                title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                style="background:{{ $colorVariation->color->hex }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Цвета END -->
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($firstLookBook !== null)
    <div class="ab-2592 ab-2592-a">
        <div class="categories-cards categories-cards_with-only-mobile-element">
            <div class="categories-cards__holder">
                <div class="categories-cards__list">
                    {{-- <div class="categories-card categories-card_mobile"
                        data-title="{{ $videoBanner->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                        <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $videoBanner->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</div>
                            <a href="{{ LaravelLocalization::localizeUrl(route('user.category', 3)) }}"
                                class="categories-card__href">Перейти</a>
                        </div>
                        <a href="{{ LaravelLocalization::localizeUrl(route('user.category', 3)) }}"
                            class="categories-card__link">
                            <img src="{{ asset('/uploads/banners_media/banner_info.jpg') }}"
                                class="categories-card__image" />
                        </a>
                    </div> --}}
                    <div class="categories-card">
                        {{-- <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $topLeftBanner->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</div>
                            <a href="{{ LaravelLocalization::localizeUrl(url($topLeftBanner->link)) }}"
                                class="categories-card__href">Перейти</a>
                        </div> --}}
                        <a href="{{route('user.lookbook', $firstLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($firstLookBook->big_img) }}" class="categories-card__image" />
                        </a>
                    </div>
                    <div class="categories-card categories-card-small"
                        data-title="{{ $firstLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                        <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $firstLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</div>
                            <a href="{{route('user.lookbook', $firstLookBook->id)}}"
                                class="categories-card__href">{{ $firstLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        </div>
                        <a href="{{route('user.lookbook', $firstLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($firstLookBook->small_img) }}" class="categories-card__image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @foreach ($categories->skip(3)->take(3) as $category)
        <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
            data-key="homeSliderBestsellers">
            <div class="slider-news__holder">
                <div class="slider-news__wrapper">
                    <div class="slider-news__head">
                        <a href="{{ LaravelLocalization::localizeUrl(route('user.category', $category->slug)) }}"
                            style="    color: #887568;text-decoration:none;"
                            class="slider-news__title">{{ $category->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        <div class="slider-news__controls"> <button type="button"
                                class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                                class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                    </div>
                    <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                        @foreach ($category->colorVariations()->take(10)->get()
        as $bestseller)
                            <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $bestseller->product->slug,
        'color' => $bestseller->color->slug,
    ]),
) }}"
                                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                                data-id="105546">
                                <div class="catalog-list__preview">
                                    <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $bestseller->id)->count() > 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $bestseller->id)->count() == 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <img src="{{ asset($bestseller->main_img()) }}"
                                        data-observer-src="{{ asset($bestseller->main_img()) }}"
                                        alt="{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                        class="catalog-list__image" />
                                    <div class="page-preloader__loading news-loader"></div>
                                </div>
                                <div class="catalog-list__box slider-news__box">

                                    <!-- Заголовок товара -->
                                    <div class="catalog-list__title">
                                        <div class="catalog-list__title-inn">
                                            <span>{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @if ($bestseller->color->id !== 76)
                                                    {{ $bestseller->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Заголовок товара END -->

                                    <!-- Цена и скидка товара -->
                                    <div class="catalog-list__price">
                                        @if ($bestseller->sizeVariations->sortBy('price')->first()->price == $bestseller->sizeVariations->sortByDesc('price')->first()->price)
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }}
                                        @else
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }} -
                                            {{ $bestseller->sizeVariations->sortByDesc('price')->first()->price }}
                                        @endif {{ __('userpanel.currency') }}
                                    </div>
                                    <!-- Цена и скидка товара END -->

                                    <!-- Цвета -->
                                    <ul class="catalog-list__colors catalog-list-colors">
                                        @foreach ($bestseller->product->colorVariations as $colorVariation)
                                            <li class="catalog-list-colors__color "
                                                title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                style="background:{{ $colorVariation->color->hex }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Цвета END -->
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($secondLookBook !== null)
    <div class="ab-2592 ab-2592-a">
        <div class="categories-cards">
            <div class="categories-cards__holder">
                <div class="categories-cards__list">

                    <div class="categories-card categories-card-small"
                        data-title="{{ $secondLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                        <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $secondLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</div>
                            <a href="{{route('user.lookbook', $secondLookBook->id)}}"
                                class="categories-card__href">{{ $secondLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        </div>
                        <a href="{{route('user.lookbook', $secondLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($secondLookBook->small_img) }}" class="categories-card__image" />
                        </a>
                    </div>

                    <div class="categories-card">
                        {{-- <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $downLeftBanner->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</div>
                            <a href="{{ LaravelLocalization::localizeUrl(url($downLeftBanner->link)) }}"
                                class="categories-card__href">Перейти</a>
                        </div> --}}
                        <a href="{{route('user.lookbook', $secondLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($secondLookBook->big_img) }}" class="categories-card__image" />
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @endif

    @foreach ($categories->skip(6)->take(4) as $category)
        <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
            data-key="homeSliderBestsellers">
            <div class="slider-news__holder">
                <div class="slider-news__wrapper">
                    <div class="slider-news__head">
                        <a href="{{ LaravelLocalization::localizeUrl(route('user.category', $category->slug)) }}"
                            style="    color: #887568;text-decoration:none;"
                            class="slider-news__title">{{ $category->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        <div class="slider-news__controls"> <button type="button"
                                class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                                class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                    </div>
                    <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                        @foreach ($category->colorVariations()->take(10)->get()
        as $bestseller)
                            <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $bestseller->product->slug,
        'color' => $bestseller->color->slug,
    ]),
) }}"
                                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                                data-id="105546">
                                <div class="catalog-list__preview">
                                    <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $bestseller->id)->count() > 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $bestseller->id)->count() == 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <img src="{{ asset($bestseller->main_img()) }}"
                                        data-observer-src="{{ asset($bestseller->main_img()) }}"
                                        alt="{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                        class="catalog-list__image" />
                                    <div class="page-preloader__loading news-loader"></div>
                                </div>
                                <div class="catalog-list__box slider-news__box">

                                    <!-- Заголовок товара -->
                                    <div class="catalog-list__title">
                                        <div class="catalog-list__title-inn">
                                            <span>{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @if ($bestseller->color->id !== 76)
                                                    {{ $bestseller->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Заголовок товара END -->

                                    <!-- Цена и скидка товара -->
                                    <div class="catalog-list__price">
                                        @if ($bestseller->sizeVariations->sortBy('price')->first()->price == $bestseller->sizeVariations->sortByDesc('price')->first()->price)
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }}
                                        @else
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }} -
                                            {{ $bestseller->sizeVariations->sortByDesc('price')->first()->price }}
                                        @endif {{ __('userpanel.currency') }}
                                    </div>
                                    <!-- Цена и скидка товара END -->

                                    <!-- Цвета -->
                                    <ul class="catalog-list__colors catalog-list-colors">
                                        @foreach ($bestseller->product->colorVariations as $colorVariation)
                                            <li class="catalog-list-colors__color "
                                                title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                style="background:{{ $colorVariation->color->hex }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Цвета END -->
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($thirdLookBook !== null)
    <div class="ab-2592 ab-2592-a">
        <div class="categories-cards">
            <div class="categories-cards__holder">
                <div class="categories-cards__list">

                    <div class="categories-card">
                        {{-- <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $secondDownLeftBanner->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                            </div>
                            <a href="{{ LaravelLocalization::localizeUrl(url($secondDownLeftBanner->link)) }}"
                                class="categories-card__href">Перейти</a>
                        </div> --}}
                        <a href="{{route('user.lookbook', $thirdLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($thirdLookBook->big_img) }}" class="categories-card__image" />
                        </a>
                    </div>

                    <div class="categories-card categories-card-small">
                        <div class="categories-card__head">
                            <div class="categories-card__title">
                                {{ $thirdLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                            </div>
                            <a href="{{route('user.lookbook', $thirdLookBook->id)}}"
                                class="categories-card__href">{{ $thirdLookBook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        </div>
                        <a href="{{route('user.lookbook', $thirdLookBook->id)}}"
                            class="categories-card__link">
                            <img src="{{ asset($thirdLookBook->small_img) }}" class="categories-card__image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @foreach ($categories->skip(10) as $category)
        <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
            data-key="homeSliderBestsellers">
            <div class="slider-news__holder">
                <div class="slider-news__wrapper">
                    <div class="slider-news__head">
                        <a href="{{ LaravelLocalization::localizeUrl(route('user.category', $category->slug)) }}"
                            style="    color: #887568;text-decoration:none;"
                            class="slider-news__title">{{ $category->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}</a>
                        <div class="slider-news__controls"> <button type="button"
                                class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                                class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                    </div>
                    <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                        @foreach ($category->colorVariations()->take(10)->get()
        as $bestseller)
                            <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $bestseller->product->slug,
        'color' => $bestseller->color->slug,
    ]),
) }}"
                                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                                data-id="105546">
                                <div class="catalog-list__preview">
                                    <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $bestseller->id)->count() > 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $bestseller->id)->count() == 0) style="display:none" @endif
                                        color-variation-id="{{ $bestseller->id }}"></span>
                                    <img src="{{ asset($bestseller->main_img()) }}"
                                        data-observer-src="{{ asset($bestseller->main_img()) }}"
                                        alt="{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                        class="catalog-list__image" />
                                    <div class="page-preloader__loading news-loader"></div>
                                </div>
                                <div class="catalog-list__box slider-news__box">

                                    <!-- Заголовок товара -->
                                    <div class="catalog-list__title">
                                        <div class="catalog-list__title-inn">
                                            <span>{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @if ($bestseller->color->id !== 76)
                                                    {{ $bestseller->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Заголовок товара END -->

                                    <!-- Цена и скидка товара -->
                                    <div class="catalog-list__price">
                                        @if ($bestseller->sizeVariations->sortBy('price')->first()->price == $bestseller->sizeVariations->sortByDesc('price')->first()->price)
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }}
                                        @else
                                            {{ $bestseller->sizeVariations->sortBy('price')->first()->price }} -
                                            {{ $bestseller->sizeVariations->sortByDesc('price')->first()->price }}
                                        @endif {{ __('userpanel.currency') }}
                                    </div>
                                    <!-- Цена и скидка товара END -->

                                    <!-- Цвета -->
                                    <ul class="catalog-list__colors catalog-list-colors">
                                        @foreach ($bestseller->product->colorVariations as $colorVariation)
                                            <li class="catalog-list-colors__color "
                                                title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                                style="background:{{ $colorVariation->color->hex }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Цвета END -->
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
        data-key="homeSliderBestsellers">
        <div class="slider-news__holder">
            <div class="slider-news__wrapper">
                <div class="slider-news__head">
                    <div class="slider-news__title">Bestsellers</div>
                    <div class="slider-news__controls"> <button type="button"
                            class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                            class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                </div>
                <div class="slider-news__list js-slider-news new-on-week-block home-slider__list">
                    @foreach ($bestseller_products as $bestseller)
                        <a href="{{ LaravelLocalization::localizeUrl(
    route('user.product', [
        'product' => $bestseller->product->slug,
        'color' => $bestseller->color->slug,
    ]),
) }}"
                            class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item"
                            data-id="105546">
                            <div class="catalog-list__preview">
                                <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $bestseller->id)->count() > 0) style="display:none" @endif
                                    color-variation-id="{{ $bestseller->id }}"></span>
                                <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" @if ($wishlist->where('id', $bestseller->id)->count() == 0) style="display:none" @endif
                                    color-variation-id="{{ $bestseller->id }}"></span>
                                <img src="{{ asset($bestseller->main_img()) }}"
                                    data-observer-src="{{ asset($bestseller->main_img()) }}"
                                    alt="{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                    class="catalog-list__image" />
                                <div class="page-preloader__loading news-loader"></div>
                            </div>
                            <div class="catalog-list__box slider-news__box">

                                <div class="catalog-list__info catalog-list__info_head">




                                    <div class="catalog-list__tag catalog-list__new">Bestseller</div>

                                </div>

                                <!-- Заголовок товара -->
                                <div class="catalog-list__title">
                                    <div class="catalog-list__title-inn">
                                        <span>{{ $bestseller->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                            @if ($bestseller->color->id !== 76){{ $bestseller->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}@endif</span>
                                    </div>
                                </div>
                                <!-- Заголовок товара END -->

                                <!-- Цена и скидка товара -->
                                <div class="catalog-list__price">
                                    @if ($bestseller->sizeVariations->sortBy('price')->first()->price == $bestseller->sizeVariations->sortByDesc('price')->first()->price)
                                        {{ $bestseller->sizeVariations->sortBy('price')->first()->price }}
                                    @else
                                        {{ $bestseller->sizeVariations->sortBy('price')->first()->price }} -
                                        {{ $bestseller->sizeVariations->sortByDesc('price')->first()->price }}
                                    @endif {{ __('userpanel.currency') }}
                                </div>
                                <!-- Цена и скидка товара END -->

                                <!-- Цвета -->
                                <ul class="catalog-list__colors catalog-list-colors">
                                    @foreach ($bestseller->product->colorVariations as $colorVariation)
                                        <li class="catalog-list-colors__color "
                                            title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                            style="background:{{ $colorVariation->color->hex }}">
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Цвета END -->
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    @if ($instagram_posts->count() > 0)
        <div class="slider-news home-previews-slider" data-ga-name="Stories">
            <div class="slider-news__holder">
                <div class="slider-news__wrapper">
                    <div class="slider-news__head">
                        <div class="slider-news__title">Мы в Instagram</div>
                        <div class="slider-news__controls"> <button type="button"
                                class="slider-news__arrow slider-news__arrow_prev">Prev</button> <button type="button"
                                class="slider-news__arrow slider-news__arrow_next">Next</button> </div>
                    </div>
                    <div class="slider-news__list js-slider-collections preview-block">
                        @foreach ($instagram_posts as $inst_post)
                            <a href="{{ $inst_post->post_link }}" class="slider-news__item preview-link" target="_blank"
                                data-id="" data-position="" data-title="">
                                <div class="slider-news__media"><img alt="" src="$inst_post->img_link"
                                        class="slider-news__image" /> </div>
                                <div class="slider-news__item-title"><span></span></div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/js/fast-catalog-item/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/home/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.esm.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('body').on('click', '.js-add-fav', function(e) {
            e.preventDefault()
            e.stopPropagation()
            addToWishList(e)
            $(".js-rem-fav", $(e.target).closest(".catalog-list__preview")).show(), $(".js-add-fav", $(e.target)
                .closest(".catalog-list__preview")).hide()
        })

        $('body').on('click', '.js-rem-fav', function(e) {
            e.preventDefault()
            e.stopPropagation()
            addToWishList(e)
            $(".js-add-fav", $(e.target).closest(".catalog-list__preview")).show(), $(".js-rem-fav", $(e.target)
                .closest(".catalog-list__preview")).hide()
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
        $(document).ready(function() {
            $('.slick-slider').slick({
                adaptiveHeight: true,
                autoplay: true,
                arrows: false,
                pauseOnHover: false,
                autoplaySpeed: 6500,
            })
        })

    </script>
@endsection

@section('head')
    <title>Интернет-магазин детской одежды - Дом на дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="description" content="Интернет-магазин детской одежды - Дом на дереве">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/js/home/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide-core.min.css">

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
    <html lang="ru-RU" class="t-main-new t-media-head">
@endsection
