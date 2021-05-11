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

    <a href="/cart" class="popupify__button popupify__button--fix" data-ga-category="Checkout" data-ga-action="Checkout click popup" data-ga-label="Пользователь залогинен">
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

  <div id="select_subscribe_size" class="popup popupify-inner">
    <h4 class="popupify-inner__title">
      Выберите размер </h4>
    <div class="card-sizes__list-item">
      <div class="card-sizes card__sizes card-sizes__redesign">
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125054" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                XXS </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125049" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                XS </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125047" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                S </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125046" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                M </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125045" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                L </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <label href="/catalog/item-subscribe/125048" class="card-sizes__label-wrap card-sizes__subscribe">
            <span class="card-sizes__label">
              <span class="card-sizes__title">
                XL </span>
            </span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div id="select_size" class="popup popupify-inner">
    <h4 class="popupify-inner__title">
      Выберите размер </h4>
    <div class="card-sizes card__sizes card-sizes__redesign">
      <div class="card-sizes__list-item">
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp42" data-sid="s42" value="125054" class="card-sizes__input" data-url="/cart/add-item/125054/1" />

          <label for="sp42" href="/catalog/item-subscribe/125054" class="card-sizes__label-wrap  js-label_in_popup">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                XXS </span>
            </span>
            <div class="card-sizes__comment">Последний</div>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp45" data-sid="s45" value="125049" class="card-sizes__input" data-url="/cart/add-item/125049/1" />

          <label for="sp45" href="/catalog/item-subscribe/125049" class="card-sizes__label-wrap  js-label_in_popup">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                XS </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp3" data-sid="s3" value="125047" class="card-sizes__input" data-url="/cart/add-item/125047/1" />

          <label for="sp3" href="/catalog/item-subscribe/125047" class="card-sizes__label-wrap  js-label_in_popup">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                S </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp4" data-sid="s4" value="125046" class="card-sizes__input" data-url="/cart/add-item/125046/1" />

          <label for="sp4" href="/catalog/item-subscribe/125046" class="card-sizes__label-wrap  js-label_in_popup">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                M </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp5" data-sid="s5" value="125045" class="card-sizes__input" data-url="/cart/add-item/125045/1" />

          <label for="sp5" href="/catalog/item-subscribe/125045" class="card-sizes__label-wrap  js-label_in_popup">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                L </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="sizes-popup" id="sp6" data-sid="s6" value="125048" class="card-sizes__input" data-url="/cart/add-item/125048/1" disabled="disabled" />

          <label for="sp6" href="/catalog/item-stocks/125048" class="card-sizes__label-wrap  js-popup-stocks is_stocks ">
            <span class="card-sizes__label  ">
              <span class="card-sizes__title">
                XL </span>
            </span>
            <!--Заказать из магазина-->
            <div class="card-sizes__comment">Подписка</div>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div id="popup-sizes-wishlist" class="popupify-inner">
    <h4 class="popupify-inner__title">
      Выберите размер </h4>
    <div class="card-sizes card__sizes card-sizes__redesign">
      <div class="card-sizes__list-item">
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp42" value="125054" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125054" for="wsp42" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                XXS </span>
            </span>
            <div class="card-sizes__comment">Последний</div>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp45" value="125049" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125049" for="wsp45" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                XS </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp3" value="125047" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125047" for="wsp3" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                S </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp4" value="125046" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125046" for="wsp4" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                M </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp5" value="125045" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125045" for="wsp5" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                L </span>
            </span>
          </label>
        </div>
        <div class="card-sizes__item">
          <input type="radio" name="wishlist-sizes-popup" id="wsp6" value="125048" class="card-sizes__input" />
          <label href="/catalog/item-subscribe/125048" for="wsp6" class="card-sizes__label-wrap js-label_in_popup">
            <span class="card-sizes__label ">
              <span class="card-sizes__title">
                XL </span>
            </span>
            <!-- <div class="card-sizes__comment">Подписка</div> -->
          </label>
        </div>
      </div>
    </div>
  </div>

  <div id="popup-sizesinfo" class="popupify-inner">
    <h4 class="popupify-inner__title">{{__('userpanel.size_table_header')}}</h4>
    {{$productLangFields->size_table}}
  </div>

  <div id="measurements">
    <div class="content">
      <div class="table-wrapper" style="margin-bottom: 0; margin-left: 0; margin-right: 0">
        <div style="white-space: pre-wrap; text-align: left">Длина изделия: 96 см (XXS) 96 см (XS) 100,5 см (S)
          101 см (М) 101 cм (L) 101,5 cм (XL)
          Обхват талии: 64 см (XXS) 68 см (XS) 72 см (S) 76 см (М) 80 cм (L) 84 cм (XL)
          Обхват бедер: 92 см (XXS) 96 см (XS) 100 см (S) 104 см (М) 108 cм (L) 112 cм (XL)</div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card__holder">
    <div class="page__row product-info">
      <div class="page__sidebar page__sidebar_left js-sticky-sidebar card__back" data-holder=".card">
        <a href="{{route('user.category', $product->category_id)}}" class="page-back page-back--hidden">
          <div class="page-back__holder">
            <i class="page-back__icon"></i><span class="page-back__text page-back__text" data-js-label="{{__('userpanel.backspace_link')}}">{{__('userpanel.backspace_link')}}</span>
          </div>
        </a>
      </div>

      <div class="page__content">
        <div class="card__row">
          <div class="card__view">
            <div class="card__view-inner">
              <div class="card-media card__media">
                <div class="card-media__thumbs">
                  <div class="card-media__thumbs-list js-media-thumbs">
                    @foreach($images as $image)
                    <button class="card-media__thumbs-item">
                      <img src="{{asset($image->img_path)}}" alt="{{$product->title}}" class="card-media__thumbs-image" style="width: 58px" />
                    </button>
                    @endforeach

                  </div>
                </div>

                <!-- Кнопка назад -->
                <a href="/catalog/all" class="card-back"></a>
                <!-- Кнопка назад END -->

                <div class="card-wish card-media__wish">
                  <input type="checkbox" id="wish-1" class="card-wish__input" />
                  <label for="wish-1" class="card-wish__label"><i class="card-wish__icon"></i></label>
                </div>
                <div class="card-media__list-wrapper">
                  <div class="card-media__list-scroll">
                    <div class="card-media__list js-card-media-slider">
                      @foreach($images as $image)
                      <div class="card-media__item" style="z-index: 7" data-ga-index="{{$loop->iteration}}" data-type="image">
                        <div class="card-media__item-inner">
                          <img src="{{asset($image->img_path)}}" data-observer-src="{{asset($image->img_path)}}" alt="{{$product->title}}" data-zoom-src="{{asset($image->img_path)}}" class="card-media__image" />
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card__description card-old-element">
            <div class="card__description-holder">

              <!--Костыль SITEDEV-2034 (перенести на фронт после выкатки пересборки)-->
              <style>
                .card-sizes__from-shop,
                .card-sizes__item:hover .is_stocks .card-sizes__from-shop {
                  background-color: transparent;
                  border-color: #dbd7d2;
                  color: #dbd7d2;
                }
              </style>
              <!--Костыль SITEDEV-2034 end-->

              <!-- Тэги, заголовок, цена -->
              <div class="card-info card__info card-info__top">
                <div class="card-info__holder">



                  <ul class="card-info__tags">

                    @if($colorVariation->is_bestseller)
                    <li class="card-info__tag card-info__new ">Bestseller</li>
                    @endif
                    @if($colorVariation->is_new)
                    <li class="card-info__tag card-info__new ">New</li>
                    @endif

                  </ul>


                  <h1 class="card-info__title" data-id="105561" data-category="Трикотаж">
                    {{$colorVariation->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}} {{$colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}
                  </h1>
                  <div class="card-info__price">
                    @if($colorVariation->sizeVariations->sortBy('price')->first()->price == $colorVariation->sizeVariations->sortByDesc('price')->first()->price)
                    {{$colorVariation->sizeVariations->sortBy('price')->first()->price}}
                    @else
                    {{$colorVariation->sizeVariations->sortBy('price')->first()->price}} - {{$colorVariation->sizeVariations->sortByDesc('price')->first()->price}}
                    @endif {{__('userpanel.currency')}}
                  </div>
                </div>
              </div>
              <!-- Тэги, заголовок, цена END -->

              <!-- Цвета -->
              <div class="card-colors__wrapper" style="">

                <div class="card-colors card__colors">
                  <div class="card-colors__list">
                    @foreach($product->colorVariations as $colorVariationSample)
                    <a @if($colorVariationSample->id <> $colorVariation->id)

                        href="{{route('user.product', [
              'product' => $colorVariationSample->product->slug,
              'color' => $colorVariationSample->color->slug,
              ])}}"

                        @endif title="{{$colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}" class="card-colors__link
                        @if($colorVariationSample->id == $colorVariation->id) card-colors__link--active @endif ">
                        <span class="card-colors__color @if($colorVariationSample->id == $colorVariation->id) card-colors__color--border @endif" style="background: {{$colorVariationSample->color->hex}}"></span>
                    </a>
                    @endforeach
                  </div>
                </div>
                <div class="card-colors__wrapper-title">
                  {{__('userpanel.color')}}: <span>{{$colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span>
                </div>
              </div>
              <!-- Цвета END -->

              <!-- Размеры NEW -->
              <div class="sizes-selector">
                <div class="sizes-selector__title">
                  {{__('userpanel.choose_size')}}
                </div>
                <ul class="sizes-selector__list">

                  @foreach($colorVariation->sizeVariations as $sizeVariation)
                  <li class="sizes-selector__item " data-id="125048" data-url-to-cart="/cart/add-item/125048/1">

                    <span class="sizes-selector__size">{{$sizeVariation->size->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span>

                    <!-- <span class="sizes-selector__comment">Подписка</span> -->
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- Размеры NEW END -->

              <!-- Таблица размеров и обмеров -->
              <div class="product-description__section">
                <a href="#sizesinfo" data-ga-action="Find your size click" data-ga-label="Трикотаж" class="card-new-sizes__guide">
                  {{__('userpanel.size_table')}}
                </a>
              </div>
              <!-- Таблица размеров и обмеров END -->

              <!---------- Кнопки ----------->

              <div class="product-controls product-description__section">
                <div class="product-controls__row">

                  <div class="product-button js-product__cart product-button--main">
                    <span class="product-button__label css-hide-mobile css-hide-tablet">{{__('userpanel.add_to_cart')}}</span>
                    <span class="product-button__label css-hide-desktop">В корзину, {{$product->price}} {{__('userpanel.currency')}}</span>
                  </div>

                  <a class="product-button product-to-cart" href="/cart">
                    <span class="product-button__label">Перейти в корзину</span>
                  </a>

                  <input type="checkbox" class="product-favorite" id="wish-2" />
                  <label for="wish-2" class="product-button product-favorite__label  js-product__wishlist">
                    <span class="svg-icon svg-heart-stroke--brown-light">
                    </span><span class="svg-icon svg-heart-fill--brown-light"></span>
                  </label>
                </div>


              </div>


              <div class="card-product-details">
                <h4 class="card-product-details__title">{{__('userpanel.product_details')}}</h4>
                <ul class="card-product-details__list product-details-list">
                  <li class="product-details-list__item">
                    {{__('userpanel.product_article')}}: {{$product->sku}}
                  </li>
                  <!-- <li class="product-details-list__item">
                          Состав: 100% Хлопок </li>
                        <li class="product-details-list__item">
                          Параметры модели: 177 см, грудь 88 см, талия 62 см, бедра 91 см<br />
                          На модели размер S </li> -->
                  <li class="product-details-list__item">
                    {{$product->content}}
                  </li>
                </ul>
              </div>
              <!-- Детали END -->

              <!-- Обратный звонок и соцсети -->
              <div class="card-contact-links__wrapper card-product-details">
                <h4 class="card-product-details__title">
                  Есть вопросы? </h4>
                <ul class="contact-links card-contact-links">
                  <li class="card-contact-links__item media-query-show_tablet"><a href="tel:88005004611" data-ga-label="Phone"><span class="contact-links__icon callback"></span><span>Обратный
                        звонок</span></a></li>
                  <li class="card-contact-links__item media-query-show_mobile"><a href="https://api.whatsapp.com/send?phone=79126156257" target="_blank" data-ga-label="WhatsApp"><span class="contact-links__icon whatsapp"></span><span>WhatsApp</span></a></li>
                  <li class="card-contact-links__item media-query-show_mobile"><a href="mailto:info@domnadereve.com" data-ga-label="Email"><span class="contact-links__icon email"></span><span>Эл. почта</span></a></li>
                  <li class="card-contact-links__item media-query-show_mobile"><a href="tg://resolve?domain=twelvestoreez_bot" target="_blank" data-ga-label="Telegram"><span class="contact-links__icon telegram"></span><span>Telegram</span></a></li>
                  <li class="card-contact-links__item media-query-show_mobile"><a href="tel:88005004611" data-ga-label="Phone"><span class="contact-links__icon callback"></span><span>Телефон</span></a></li>
                </ul>
              </div>
              <!-- Обратный звонок и соцсети END -->

              <!-- Подробности -->
              <div class="card-product-details card-product-details--last card-product-more media-query-show_tablet">
                <h4 class="card-product-details__title">
                  {{__('userpanel.product_specialty')}}
                </h4>
                <div class="card-features card__features">
                  <div class="card-features__holder accordion js-accordion">



                    <!-- Обмеры и описание -->
                    <div class="accordion__item card-features__item">
                      <div class="accordion__head card-features__head" data-ga-action="Description click" data-ga-label="Трикотаж">
                        <div class="accordion__title">
                          <div class="card-features__title">{{__('userpanel.product_measurements_and_desc')}}</div>
                          <div class="accordion__icon card-features__icon"></div>
                        </div>
                      </div>
                      <div class="accordion__box card-features__box">
                        <div class="card-features__text">
                          <h4 class="card-features__text-title">
                            {{__('userpanel.product_measurements')}}
                          </h4>
                          <p class="card-features__text-sizes">
                            {{$productLangFields->details}}
                          </p>
                          <h4 class="card-features__text-title">
                            {{__('userpanel.product_desc')}}
                          </h4>
                          <p>{{$productLangFields->content}}</p>
                        </div>
                      </div>
                    </div>
                    <!-- Обмеры и описание END -->

                    <!-- Уход за изделием -->
                    <div class="accordion__item card-features__item">
                      <div class="accordion__head card-features__head" data-ga-action="Look after click" data-ga-label="Трикотаж">
                        <div class="accordion__title">
                          <div class="card-features__title">{{__('userpanel.product_care')}}</div>
                          <div class="accordion__icon card-features__icon"></div>
                        </div>
                      </div>
                      <div class="accordion__box card-features__box">
                        <div class="card-features__text">
                          {{$productLangFields->care}}
                        </div>
                      </div>
                    </div>
                    <!-- Уход за изделием END -->

                    <!-- Отзывы -->
                    <!-- Отзывы END -->

                  </div>
                </div>
              </div>
              <!-- Подробности END -->

              <!-- Попап выбора размера при добавлении в корзину // mobile -->
              <div class="card-sizes-choose-mobile">
                <div class="popupify-inner mobile-sizes-popup">
                  <h4 class="popupify-inner__title">
                    Выберите размер </h4>
                  <div id="wheel-selector" class="date-selector">
                  </div>
                  <div class="mobile-sizes-popup__sizes-guide">
                    <span data-ga-action="Find your size click" data-ga-label="Трикотаж">
                      Таблица размеров и обмеры </span>
                  </div>
                  <div class="mobile-sizes-popup__button">
                    <span class="mobile-sizes-popup__button-text">
                      {{__('userpanel.add_to_cart')}} </span>
                  </div>
                </div>
              </div>
              <!-- Попап выбора размера при добавлении в корзину // mobile END -->



            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page__row">
      <div class="page__middle">
        <div class="ab-hide-more-btn">
          <button type="submit" class="button">Показать больше</button>
        </div>
        <div class="ab-hide-more">

          <!-- Подробности mobile -->
          <div class="card-product-details card-product-more media-query-show_mobile">
            <h4 class="card-product-details__title">
              Подробности
            </h4>
            <div class="card-features card__features">
              <div class="card-features__holder accordion js-accordion">

                <!-- Обмеры и описание -->
                <div class="accordion__item card-features__item">
                  <div class="accordion__head card-features__head" data-ga-action="Description click" data-ga-label="Трикотаж">
                    <div class="accordion__title">
                      <div class="card-features__title">{{__('userpanel.product_measurements_and_desc')}}</div>
                      <div class="accordion__icon card-features__icon"></div>
                    </div>
                  </div>
                  <div class="accordion__box card-features__box">
                    <div class="card-features__text">
                      <h4 class="card-features__text-title">
                        {{__('userpanel.product_measurements')}}
                      </h4>
                      <p class="card-features__text-sizes">
                        {{$productLangFields->details}}
                      </p>
                      <h4 class="card-features__text-title">
                        {{__('userpanel.product_desc')}}
                      </h4>
                      <p>
                        {{$productLangFields->content}}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- Обмеры и описание END -->

                <!-- Уход за изделием -->
                <div class="accordion__item card-features__item">
                  <div class="accordion__head card-features__head" data-ga-action="Look after click" data-ga-label="Трикотаж">
                    <div class="accordion__title">
                      <div class="card-features__title">{{__('userpanel.product_care')}}</div>
                      <div class="accordion__icon card-features__icon"></div>
                    </div>
                  </div>
                  <div class="accordion__box card-features__box">
                    <div class="card-features__text">
                      {{$productLangFields->care}}
                    </div>
                  </div>
                </div>
                <!-- Уход за изделием END -->

                <!-- Отзывы -->
                <!-- Отзывы END -->

              </div>
            </div>
          </div>
          <!-- Подробности mobile END -->
        </div>



        <div id="might-like" class="card__item card__item--slider">
          <div class="card__item_head">
            <h2 class="card__title">{{__('userpanel.you_may_like')}}</h2>

            <div class="card__item_controls card-item-controls accompaniments-controls">
              <div class="card-item-controls__prev"></div>
              <div class="card-item-controls__next"></div>
            </div>

            <div class="card__item_controls card-item-controls card-item-controls--kimber kimber-controls">
              <div class="card-item-controls__prev"></div>
              <div class="card-item-controls__next"></div>
            </div>
          </div>

          <div class="card__item_our-accompaniments">

            <div class="catalog-list card__might-like js-catalog-list-slider accompaniments-block" data-controls="accompaniments-controls">
              <div class="catalog-list__holder">
                <div class="catalog-list__row">
                  @foreach($related_products as $related_product)
                  <div class="catalog-list__item accompaniment-item" data-id="102449">

                    <a href="{{route('user.product', $related_product->related_id)}}" class="catalog-list__link accompaniment-link" data-id="102449" data-type="accompaniment">
                      <div class="catalog-list__preview catalog-list__preview--round">
                        <span class="catalog-list__fav catalog-list__fav__in js-rem-fav" style="display:none"></span>
                        <span class="catalog-list__fav js-add-fav"></span>
                        <img src="{{asset('uploads/single/' . $related_product->img)}}" alt="{{$related_product->title}}" data-observer-src="{{asset('uploads/single/' . $related_product->img)}}" class="catalog-list__image" />
                      </div>

                      <div class="catalog-list__box">

                        <div class="catalog-list__info catalog-list__info_head">





                        </div>

                        <!-- Заголовок товара -->
                        <div class="catalog-list__title">
                          <div class="catalog-list__title-inn">
                            <span>{{$related_product->title}}</span>
                          </div>
                        </div>
                        <!-- Заголовок товара END -->

                        <!-- Цена и скидка товара -->
                        <div class="catalog-list__price">
                          {{$related_product->price}} {{__('userpanel.currency')}}
                        </div>
                        <!-- Цена и скидка товара END -->

                      </div>
                    </a>

                    <!-- Цвета -->
                    <!-- <ul class="catalog-list__colors catalog-list-colors">
                            <li class="catalog-list-colors__color " title="Чёрный" style="background: #000000">
                            </li>
                          </ul> -->
                    <!-- Цвета END -->
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="card__item_kimber-accompaniments card__item--slider">

                  <div class="catalog-list card__might-like js-catalog-list-slider accompaniments-block"
                    data-controls="kimber-controls">
                    <div class="catalog-list__holder">
                      <div class="catalog-list__row">
                        <div class="catalog-list__item accompaniment-item" data-id="105094">
                          <a href="/catalog/topy-i-bluzy/bluza-s-razrezami-po-bokam-cernyj"
                            class="catalog-list__link accompaniment-link" data-id="105094" data-type="accompaniment">
                            <div class="catalog-list__preview catalog-list__preview--round">
                              <span class="catalog-list__fav catalog-list__fav__in js-rem-fav"
                                style="display:none"></span>
                              <span class="catalog-list__fav js-add-fav"></span>
                              <img
                                src="/images/99x125_90_out/uploads/images/CATALOG/top/104581/5f3550a54e741-12storeez-iyul-2020-01445.jpg"
                                alt="Блуза с разрезами по бокам (Черный)"
                                data-observer-src="/images/398x500_90_out/uploads/images/CATALOG/top/104581/5f3550a54e741-12storeez-iyul-2020-01445.jpg"
                                class="catalog-list__image" />
                            </div>

                            <div class="catalog-list__box">

                              <div class="catalog-list__info catalog-list__info_head">





                              </div>

                              <div class="catalog-list__title">
                                <div class="catalog-list__title-inn">
                                  <span>Блуза с разрезами по бокам (Черный)</span>
                                </div>
                              </div>

                              <div class="catalog-list__price">
                                3 980 {{__('userpanel.currency')}} <s class="catalog-list__price-old">7 980 {{__('userpanel.currency')}}</s>
                              </div>


                            </div>
                          </a>


                          <ul class="catalog-list__colors catalog-list-colors">
                            <li class="catalog-list-colors__color " title="Черный" style="background: #000000">
                            </li>
                            <li class="catalog-list-colors__color " title="Бежевый" style="background: #ddbb98">
                            </li>
                          </ul>

                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div> -->

          <div data-popmechanic-embed="16788" data-popmechanic-argument="105561"></div>

        </div>

        <div class="card__item card__item_lastview card__item--slider">

          <div class="card__item_head ">
            <h2 class="card__title">{{__('userpanel.you_recently_viewed')}}</h2>
            <div class="card__item_controls card-item-controls last-view-controls">
              <div class="card-item-controls__prev"></div>
              <div class="card-item-controls__next"></div>
            </div>
          </div>
          <div class="catalog-list card__might-like js-catalog-list-slider last-view-block" data-controls="last-view-controls" data-location="">
            <div class="catalog-list__holder">
              <div class="catalog-list__row">
                @foreach($recently_viewed_products as $recently_viewed_product)
                <div class="catalog-list__item last-view-item" data-id="105294">
                  <a href="{{route('user.product', [
              'product' => $recently_viewed_product->product->slug,
              'color' => $recently_viewed_product->color->slug,
              ])}}" class="catalog-list__link last-view-link" data-type="last_view" data-id="105294" data-category="product_card" data-action="recommendations" data-label="click_last_view">
                    <div class="catalog-list__preview catalog-list__preview--round">
                      <span class="catalog-list__fav catalog-list__fav__in js-rem-fav"></span>
                      <span class="catalog-list__fav js-add-fav" style="display:none"></span>
                      <img src="{{asset('uploads/single/' . $recently_viewed_product->main_img)}}" alt="{{$recently_viewed_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}" data-observer-src="{{asset('uploads/single/' . $recently_viewed_product->main_img)}}" class="catalog-list__image" />
                    </div>

                    <div class="catalog-list__box">

                      <div class="catalog-list__info catalog-list__info_head">





                      </div>

                      <!-- Заголовок товара -->
                      <div class="catalog-list__title">
                        <div class="catalog-list__title-inn">
                          <span>{{$recently_viewed_product->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}} {{$recently_viewed_product->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span>
                        </div>
                      </div>
                      <!-- Заголовок товара END -->

                      <!-- Цена и скидка товара -->
                      <div class="catalog-list__price">
                        @if($recently_viewed_product->sizeVariations->sortBy('price')->first()->price == $recently_viewed_product->sizeVariations->sortByDesc('price')->first()->price)
                        {{$recently_viewed_product->sizeVariations->sortBy('price')->first()->price}}
                        @else
                        {{$recently_viewed_product->sizeVariations->sortBy('price')->first()->price}} - {{$recently_viewed_product->sizeVariations->sortByDesc('price')->first()->price}}
                        @endif {{__('userpanel.currency')}}
                        <!-- <s class="catalog-list__price-old">19 980 {{__('userpanel.currency')}}</s> -->
                      </div>
                      <!-- Цена и скидка товара END -->
                    </div>
                  </a>

                  <!-- Цвета -->
                  <ul class="catalog-list__colors catalog-list-colors">
                    @foreach($recently_viewed_product->product->colorVariations as $colorVariation)
                    <li class="catalog-list-colors__color " title="{{$colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}" style="background:{{$colorVariation->color->hex}}">
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

        @if (!Auth::guest() && $wishlist <> false )
          <div class="card__item card__item_wishlist">

            <div class="card__item_head">
              <h2 class="card__title">Ваш вишлист</h2>
              <div class="card__item_controls card-item-controls wishlist-controls">
                <div class="card-item-controls__prev"></div>
                <div class="card-item-controls__next"></div>
              </div>
            </div>
            <div class="catalog-list card__might-like js-catalog-list-slider wishlist-block" data-controls="wishlist-controls">
              <div class="catalog-list__holder">
                <div class="catalog-list__row">
                  @foreach($wishlist as $wish_product)
                  <div class="catalog-list__item wishlist-item" data-id="105294">
                    <a href="/catalog/verhnaa-odezda/suba-iz-eko-meha-korotkaa-zeltyj" class="catalog-list__link wishlist-link" data-id="105294" data-type="wishlist-item">
                      <div class="catalog-list__preview catalog-list__preview--round">
                        <span class="catalog-list__fav catalog-list__fav__in js-rem-fav"></span>
                        <span class="catalog-list__fav js-add-fav" style="display:none"></span>
                        <img src="{{ asset('/uploads/single/' . $wish_product->img) }}" alt="{{$wish_product->title}}" data-observer-src="{{ asset('/uploads/single/' . $wish_product->img) }}" class="catalog-list__image" />
                      </div>

                      <div class="catalog-list__box">

                        <div class="catalog-list__info catalog-list__info_head">





                        </div>

                        <!-- Заголовок товара -->
                        <div class="catalog-list__title">
                          <div class="catalog-list__title-inn">
                            <span>{{$wish_product->title}}</span>
                          </div>
                        </div>
                        <!-- Заголовок товара END -->

                        <!-- Цена и скидка товара -->
                        <div class="catalog-list__price">
                          {{$wish_product->price}} {{__('userpanel.currency')}}
                          <!-- <s class="catalog-list__price-old">{{$wish_product->price}} {{__('userpanel.currency')}}</s> -->
                        </div>
                        <!-- Цена и скидка товара END -->

                      </div>
                    </a>

                    <!-- Цвета -->
                    <!-- <ul class="catalog-list__colors catalog-list-colors">
                          <li class="catalog-list-colors__color " title="Желтый" style="background: #ffd552">
                          </li>
                        </ul> -->
                    <!-- Цвета END -->
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
          <!-- <a href="#select_size" class="button button_powdery button_fixed card__button media-query-show_mobile js-card-button card__button_with-spaces buy_button js-popup" data-target="#might-like">{{__('userpanel.add_to_cart')}}</a> -->
      </div>
    </div>
  </div>
  <div class="card-zoom card__zoom">
    <div class="card-zoom__holder">
      <div class="card-zoom__list js-card-zoom-slider">
        @foreach($images as $image)
        <div class="card-zoom__item">
          <img src="{{asset($image->path)}}" data-observer-src="{{asset($image->path)}}" class="card-zoom__image" />
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Локализация для js размеров -->
  <input type="hidden" class="card-button-locale--subscribe" value="Сообщить о поступлении">
  <input type="hidden" class="card-button-locale--subscribed" value="Вы подписаны">
  <input type="hidden" class="card-button-locale--preorder" value="Оформить предзаказ">
  <div style="display:none" class="card-button-locale--add-to-cart">
    <span class="product-button__label css-hide-mobile css-hide-tablet">{{__('userpanel.add_to_cart')}}</span>
    <span class="product-button__label css-hide-desktop">В корзину, 5 980 {{__('userpanel.currency')}}</span>
  </div>
  <input type="hidden" class="card-button-locale--size" value="Размер">
  <!-- Локализация для js размеров END -->

  <!-- Локализация для аб теста SITEDEV-2658 -->
  <input type="hidden" class="thanks-popup-ab__locale-one" value="экземпляр">
  <input type="hidden" class="thanks-popup-ab__locale-some" value="экземпляра">
  <input type="hidden" class="thanks-popup-ab__locale-many" value="экземпляров">
  <!-- Локализация для аб теста SITEDEV-2658 end -->

</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/yii.js')}}"></script>
<script src="{{asset('assets/js/chunks/vendor.js')}}"></script>
<script src="{{asset('assets/js/chunks/layout-base.js')}}"></script>
<script src="{{asset('assets/js/fast-catalog-item/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>
@endsection

@section('head')
<title>{{$product->title}} в интернет-магазине — Дом на дереве</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
<meta name="description" content="{{$product->title}} - от Дом на дереве за {{$product->price}} {{__('userpanel.currency')}}">
<link rel="stylesheet" href="{{asset('assets/css/fast-catalog-item/styles.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/autocomplete.css')}}">
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