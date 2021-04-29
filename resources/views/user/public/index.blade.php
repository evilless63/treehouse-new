@extends('user.layouts.main')

@section('content')
<div class="snow-frame" id="snow-frame"></div>


      <div class="hero" data-id="48" data-title="Приветственный текст Дом на дереве (для акций и тд и тп)">

        <div class="hero__media hero__image-wrapper">
          <img class="hero__image"
            src="{{asset('/uploads/banners_media/banner_info.jpg')}}"
            alt="Приветственный текст Дом на дереве (для акций и тд и тп)">
        </div>

        <a href="{{route('user.category', 6)}}" class="hero__holder">
          <span class="hero__button">Приветственный текст Дом на дереве (для акций и тд и тп)</span>
        </a>
      </div>

      <div class="ab-2592 ab-2592-b">
        <div class="home-categories__wrapper">
          <div class="home-categories__holder">
            <div class="home-categories__list">
              <div class="categories-card home-categories__item" data-title="Приветственный текст Дом на дереве (для акций и тд и тп)">
                <div class="home-categories__item-inner">
                  <div class="home-categories__image">
                    
                  </div>
                  <div class="categories-card__title">Приветственный текст Дом на дереве (для акций и тд и тп)</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__link"></a>
                </div>
              </div>

              <div class="categories-card home-categories__item" data-title="Платья">
                <div class="home-categories__item-inner">
                  <div class="home-categories__image"
                    style="background-image: url('/images/598x750_90_out/uploads/images/CATALOG/jackets/104040/5ffd5ab34cf72-novinki.jpg');">
                  </div>
                  <div class="categories-card__title">Платья</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__link"></a>
                </div>
              </div>

              <div class="categories-card home-categories__item" data-title="Стильные аксессуары">
                <div class="home-categories__item-inner">
                  <div class="home-categories__image"
                    style="background-image: url('/images/598x750_90_out/uploads/images/CATALOG/jackets/104040/5ffd4e93a6e0d-verhnyaya-odezhda.jpg');">
                  </div>
                  <div class="categories-card__title">Стильные аксессуары</div>
                  <a href="{{route('user.category', 5)}}"
                    class="categories-card__link"></a>
                </div>
              </div>

              <div class="categories-card home-categories__item" data-title="Самый первый альбом">
                <div class="home-categories__item-inner">
                  <div class="home-categories__image"
                    style="background-image: url('/images/598x750_90_out/uploads/images/CATALOG/jackets/104040/5ffd4ec76ec95-trikotazh.jpg');">
                  </div>
                  <div class="categories-card__title">Самый первый альбом</div>
                  <a href="{{route('user.category', 5)}}" class="categories-card__link"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="ab-2592 ab-2592-a">
        <div class="categories-cards categories-cards_with-only-mobile-element">
          <div class="categories-cards__holder">
            <div class="categories-cards__list">
              <div class="categories-card categories-card_mobile" data-title="Приветственный текст Дом на дереве (для акций и тд и тп)">
                <div class="categories-card__head">
                  <div class="categories-card__title">Приветственный текст Дом на дереве (для акций и тд и тп)</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img src="{{asset('/uploads/banners_media/banner_info.jpg')}}"
                    class="categories-card__image" />
                </a>
              </div>
              <div class="categories-card" data-title="Атмосферные шатры">
                <div class="categories-card__head">
                  <div class="categories-card__title">Атмосферные шатры</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img src="{{asset('uploads/banners_media/shatry.jpg')}}"
                    class="categories-card__image" />
                </a>
              </div>
              <div class="categories-card" data-title="Стильные аксессуары">
                <div class="categories-card__head">
                  <div class="categories-card__title">Стильные аксессуары</div>
                  <a href="{{route('user.category', 3)}}"
                    class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img
                    src="{{asset('uploads/banners_media/stilnye.png')}}"
                    class="categories-card__image" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-news home-slider" data-name="Новое на этой неделе" data-ga-name="New this week"
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
              @foreach($new_products as $new_product)
              
              <a href="{{route('user.product', [
              'product' => $new_product->slug,
              'color' => $new_product->colorVariations->first()->color->slug,
              ])}}"
                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item" data-id="105559">
                <div class="catalog-list__preview">
                  <img
                    src="{{ asset('uploads//single/' . $new_product->img) }}"
                    data-observer-src="{{ asset('uploads//single/' . $new_product->img) }}"
                    alt="{{$new_product->title}}" class="catalog-list__image" />
                  <div class="page-preloader__loading news-loader"></div>
                </div>
                <div class="catalog-list__box slider-news__box">

                  <div class="catalog-list__info catalog-list__info_head">




                    <div class="catalog-list__tag catalog-list__new">New</div>

                  </div>

                  <!-- Заголовок товара -->
                  <div class="catalog-list__title">
                    <div class="catalog-list__title-inn">
                      <span>{{$new_product->title}}</span>
                    </div>
                  </div>
                  <!-- Заголовок товара END -->

                  <!-- Цена и скидка товара -->
                  <div class="catalog-list__price">
                  {{$new_product->price}} ₽ </div>
                  <!-- Цена и скидка товара END -->

                  <!-- Цвета -->
                  <!-- <ul class="catalog-list__colors catalog-list-colors">


                    <li class="catalog-list-colors__color " title="Чёрный" style="background:#000000">
                    </li>


                    <li class="catalog-list-colors__color " title="Молочный" style="background:#fff3e7">
                    </li>


                    <li class="catalog-list-colors__color " title="Кофейный" style="background:#98897a">
                    </li>

                    <li class="slider-news__color-count">+3</li>

                  </ul> -->
                  <!-- Цвета END -->
                </div>
              </a>

              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="ab-2592 ab-2592-a">
        <div class="categories-cards">
          <div class="categories-cards__holder">
            <div class="categories-cards__list">
              <div class="categories-card eveke" data-title="Самый первый альбом">
                <div class="categories-card__head">
                  <div class="categories-card__title">Самый первый альбом</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img src="{{asset('uploads/banners_media/albom.jpg')}}"
                    class="categories-card__image" />
                </a>
              </div>

              <div class="categories-card" data-title="Удобная детская одежда">
                <div class="categories-card__head">
                  <div class="categories-card__title">Удобная детская одежда</div>
                  <a href="{{route('user.category', 3)}}" class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img src="{{asset('uploads/banners_media/odejda.jpg')}}"
                    class="categories-card__image" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ab-2592 ab-2592-b">
        <div class="categories-cards">
          <div class="categories-cards__holder">
            <div class="categories-cards__list">
              <div class="categories-card" data-title="Удобная детская одежда">
                <div class="categories-card__head">
                  <div class="categories-card__title">Удобная детская одежда</div>
                  <a href="{{route('user.category', 3)}} class="categories-card__href">Перейти</a>
                </div>
                <a href="{{route('user.category', 3)}}" class="categories-card__link">
                  <img src="/images/598x750_90_out/uploads/images/CATALOG/jackets/104040/5ffd4eab165fa-obuv.jpg"
                    class="categories-card__image" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-news home-slider" data-name="Bestsellers" data-ga-name="Bestsellers"
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
            @foreach($bestseller_products as $bestseller)
              <a href="{{route('user.product', [
              'product' => $bestseller->slug,
              'color' => $bestseller->colorVariations->first()->color->slug,
              ])}}"
                class="catalog-list__item slider-news__item new-on-week-item-link home-slider__item" data-id="105546">
                <div class="catalog-list__preview">
                  <img
                    src="{{ asset('uploads/single/' . $bestseller->img) }}"
                    data-observer-src="{{ asset('uploads//single/' . $bestseller->img) }}"
                    alt="{{$bestseller->title}}" class="catalog-list__image" />
                  <div class="page-preloader__loading news-loader"></div>
                </div>
                <div class="catalog-list__box slider-news__box">

                  <div class="catalog-list__info catalog-list__info_head">




                    <div class="catalog-list__tag catalog-list__new">Bestseller</div>

                  </div>

                  <!-- Заголовок товара -->
                  <div class="catalog-list__title">
                    <div class="catalog-list__title-inn">
                      <span>{{$bestseller->title}}</span>
                    </div>
                  </div>
                  <!-- Заголовок товара END -->

                  <!-- Цена и скидка товара -->
                  <div class="catalog-list__price">
                    {{$bestseller->price}} ₽ </div>
                  <!-- Цена и скидка товара END -->

                  <!-- Цвета -->
                  <!-- <ul class="catalog-list__colors catalog-list-colors">


                    <li class="catalog-list-colors__color " title="Бежевый" style="background:#ddbb98">
                    </li>


                    <li class="catalog-list-colors__color " title="Серый" style="background:#9d9a9a">
                    </li>


                    <li class="catalog-list-colors__color " title="Черный" style="background:#000000">
                    </li>

                    <li class="slider-news__color-count">+1</li>

                  </ul> -->
                  <!-- Цвета END -->
                </div>
              </a>
            @endforeach
            </div>
          </div>
        </div>
      </div>
      @if($instagram_posts->count() > 0)
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
            @foreach($instagram_posts as $inst_post)
              <a href="{{$inst_post->post_link}}" class="slider-news__item preview-link" target="_blank" data-id=""
                data-position="" data-title="">
                <div class="slider-news__media"><img alt=""
                    src="$inst_post->img_link"
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
<title>Интернет-магазин детской одежды - Дом на дереве</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Интернет-магазин детской одежды - Дом на дереве">

  <link rel="stylesheet" href="{{asset('assets/js/home/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/fast-catalog-item/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
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
<html lang="ru-RU" class="t-main-new t-media-head">
@endsection