@extends('user.layouts.main')

@section('content')

@if (\Session::has('success'))
<div class="alert alert-success">
  <ul>
    <li>{!! \Session::get('success') !!}</li>
  </ul>
</div>
@endif

<form method="post" action="{{route('makeorder')}}">
  @csrf
  <div data-v-cfe42f2e="" class="cart-frame">
    <div data-v-cfe42f2e="" class="cart">
      <div data-v-cfe42f2e="" class="cart-header"></div>
      <div data-v-cfe42f2e="" class="cart-body">
        <div data-v-cfe42f2e="" class="left">
          <div data-v-cfe42f2e="" class="title">Корзина</div>
        </div>
        <div data-v-cfe42f2e="" class="right">
          <!---->
          <!---->
          @if($cart->isEmpty()) 
            <p style="padding: 48px 0;
    text-align: center;">Ваша корзина пока пуста</p>
          @else
          <div data-v-1b2b3207="" data-v-cfe42f2e="" class="basket order-list order__list">
            @foreach($cart as $cartItem)
            <div data-v-1b2b3207="" class="order-list__item" row-id="{{$cartItem->rowId}}">
              <div data-v-1b2b3207="" class="goods goods_edit order-list__goods">
                <div data-v-1b2b3207="" class="goods__preview"><a data-v-1b2b3207="" href="
                {{LaravelLocalization::localizeUrl(route('user.product', [
              'product' => $cartItem->options->product_slug,
              'color' => $cartItem->options->color,
              ]))}}
                " class="goods__link"><img data-v-1b2b3207="" src="{{asset($cartItem->options->image)}}" alt="{{$cartItem->name}}" class="goods__image"></a></div>
                <div data-v-1b2b3207="" class="goods__box">
                  <div data-v-1b2b3207="" class="goods__spec"><a data-v-1b2b3207="" href="
                  {{LaravelLocalization::localizeUrl(route('user.product', [
              'product' => $cartItem->options->product_slug,
              'color' => $cartItem->options->color,
              ]))}}" class="goods__head">
                      <div data-v-1b2b3207="" class="goods__code">{{$cartItem->options->code}}</div>
                      <div data-v-1b2b3207="" class="goods__title">{{$cartItem->name}}</div>
                    </a>
                    <div data-v-1b2b3207="" class="goods__info">
                      <div data-v-1b2b3207="" class="goods__info-line">
                        <div data-v-1b2b3207="" class="goods__size">{{$cartItem->options->size}}</div>
                        <div data-v-1b2b3207="" class="goods__color" style="background: {{$cartItem->options->hex}};"></div>
                        <div data-v-1b2b3207="" class="goods__count">{{$cartItem->qty}} {{__('userpanel.units')}}</div>
                        <!---->
                      </div>
                    </div>
                    <div data-v-1b2b3207="" class="goods-edit goods__edit">
                      <div data-v-1b2b3207="" class="goods-edit__handle js-order-item-handle"><i data-v-1b2b3207="" class="goods-edit__handle-icon"></i></div>
                      <div data-v-1b2b3207="" class="goods-edit__box">
                        <div data-v-1b2b3207="" class="goods-edit__row">
                          <!-- <div data-v-1b2b3207="" class="goods-edit__size">
                            <div data-v-60e4b156="" data-v-1b2b3207="" class="select">
                              <div data-v-60e4b156="" class="select-container">
                                <div data-v-c585f9a4="" data-v-60e4b156="" tabindex="0" class="select-base">
                                  <div data-v-c585f9a4="" class="select-control"><span data-v-c585f9a4="" class="select-text">
                                      S
                                    </span></div> -->
                          <!---->
                          <!-- </div>
                                <div data-v-70b16c7e="" data-v-60e4b156="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                              </div>
                            </div>
                          </div> -->
                          <div data-v-1b2b3207="" class="goods-edit__count">
                            <div data-v-1b2b3207="" class="quantity-input">
                              <div class="button-plus" onclick="changeCount(event)" count-changer="1"></div>
                              <div class="input">
                                <div class="input-container"><input autocomplete="on" type="text" class="input-control" value="{{$cartItem->qty}}" disabled>
                                  <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span>
                                  </div>
                                </div>
                              </div>
                              <div class="button-minus" onclick="changeCount(event)" count-changer="-1"></div>
                            </div>
                          </div>
                        </div> <button data-v-1b2b3207="" class="goods-edit__remove" onclick="removeCartItem(event)"></button>
                      </div>
                    </div>
                    <div data-v-1b2b3207="" class="goods__total">
                      <div data-v-1b2b3207="" class="goods__price">{{$cartItem->total}} {{__('userpanel.currency')}}</div>
                      <!---->
                    </div>
                  </div>
                </div>
              </div>
              <!---->
            </div>
            @endforeach
            <div data-v-1b2b3207="" role="modal" class="simplert">
              <div class="simplert__content">
                <div class="simplert__header">
                  <!---->
                  <!----> <b class="simplert__title"></b>
                </div>
                <div class="simplert__body">
                  <div></div>
                </div>
                <div class="simplert__footer">
                  <!----> <button class="simplert__close">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!---->
          <div data-v-cfe42f2e="" class="promo-block">
            <div data-v-131ebcb5="" data-v-cfe42f2e="" class="promo-form">
              <div data-v-131ebcb5="" class="title" id="promocode_button">Ввести промокод</div>
              <div data-v-131ebcb5="" class="wrapper collapsed" id="promocode_input">
                
                  <div data-v-131ebcb5="" class="form-inner">
                    <div data-v-131ebcb5="" class="input input">
                      <div class="input-container"><input autocomplete="on" type="text" class="input-control" id="promocode_changer">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div> <a href="{{route('user.cart.promocode', '')}}" id="promocode_link" data-v-6352a6b4="" data-v-131ebcb5="" class="button promocode-button">OK</a>
                    <!---->
                  </div>
                  <!---->
                
              </div>
              <div data-v-131ebcb5="" role="modal" class="simplert">
                <div class="simplert__content">
                  <div class="simplert__header">
                    <!---->
                    <!----> <b class="simplert__title"></b>
                  </div>
                  <div class="simplert__body">
                    <div></div>
                  </div>
                  <div class="simplert__footer">
                    <!----> <button class="simplert__close">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!---->
          </div>
          <!---->
          <div data-v-cfe42f2e="" class="bordered-block hidden">
            <!---->
            <div data-v-cfe42f2e="" class="cart__back">{{__('userpanel.backspace_link')}}</div>
            <div data-v-684b9f47="" data-v-cfe42f2e="" class="form">
              <h2 data-v-684b9f47="" class="title">Оформление заказа</h2>
              <div data-v-684b9f47="" class="observer">
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="email" class="form-item-title">E-mail</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                      <div class="input-container"><input name="email" id="email" autocomplete="on" trim="true" type="text" class="input-control" value="{{$user->email}}">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="name" class="form-item-title">Имя</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                      <div class="input-container"><input name="name" id="name" autocomplete="on" trim="true" type="text" class="input-control" value="{{$user->name}}">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="surname" class="form-item-title">Фамилия</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                      <div class="input-container"><input name="surname" id="surname" autocomplete="on" trim="true" type="text" class="input-control" value="{{$user->surname}}">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="patronymic" class="form-item-title">Отчество</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                      <div class="input-container"><input name="patronymic" id="patronymic" autocomplete="on" trim="true" type="text" class="input-control" value="{{$user->patronymic}}">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="phone" class="form-item-title">Телефон</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="input margin-s" data-v-b31126bc="">
                      <div class="input-container"><input name="phone" autocomplete="off" type="tel" class="input-control" value="{{$user->phone}}">
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
              </div>
              <div data-v-684b9f47="" class="observer">
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item radio"><label data-v-b31126bc="" for="delivery-type" class="form-item-title">Способ доставки</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="radio-group" id="delivery-type" data-v-b31126bc="">
                      <div data-v-08921c00="" class="radio"><input data-v-08921c00="" name="delivery-type" id="delivery-type-1610902120585-0" type="radio" class="radio-control" value="courier"> <label data-v-08921c00="" for="delivery-type-1610902120585-0" class="radio-label">
                          <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-label"><span data-v-684b9f47="" data-v-08921c00=""><span class="nowrap">курьер</span> <span class="nowrap">– 490&nbsp;{{__('userpanel.currency')}}</span> <span class="nowrap">(3-10 дней)</span></span>
                          </div>
                          <!---->
                          <!---->
                          <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-note visible">
                            <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-note__inner">
                              <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-note__text">
                                <p>Примерка и частичный выкуп отсутствуют, но вы можете воспользоваться бесплатным
                                  возвратом.</p>
                                <p>При получении предоплаченного заказа нужно будет предъявить паспорт
                                  на&nbsp;фамилию и имя оформителя заказа и расписаться.</p>
                              </div>
                            </div>
                          </div>
                        </label></div>
                      <div data-v-08921c00="" class="radio sdek"><input data-v-08921c00="" name="delivery-type" id="delivery-type-1610902120585-1" type="radio" class="radio-control" value="sdek"> <label data-v-08921c00="" for="delivery-type-1610902120585-1" class="radio-label">
                          <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-label"><span data-v-684b9f47="" data-v-08921c00=""><span class="nowrap">пункт выдачи
                                СДЕК</span> <span class="nowrap">– 190&nbsp;{{__('userpanel.currency')}}</span> <span class="nowrap">(3-4
                                дня)</span></span></div>
                      
                          <!---->
                          <!---->
                          <!---->
                        </label></div>

                        <div data-v-08921c00="" class="radio pochta"><input data-v-08921c00="" name="delivery-type" id="delivery-type-1610902120585-2" type="radio" class="radio-control" value="pochta"> <label data-v-08921c00="" for="delivery-type-1610902120585-2" class="radio-label">
                          <div data-v-684b9f47="" data-v-08921c00="" class="delivery-type-label"><span data-v-684b9f47="" data-v-08921c00=""><span class="nowrap">пункт выдачи
                                Почта</span> <span class="nowrap">– 190&nbsp;{{__('userpanel.currency')}}</span> <span class="nowrap">(3-4
                                дня)</span></span></div>
                          </label></div>
                      <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
              </div>
              <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="country" class="form-item-title">Страна</label>
                <div data-v-b31126bc="" class="field">
                  <div data-v-e57b8756="" data-v-684b9f47="" class="city-autocomplete" id="country" data-v-b31126bc="">
                    <div data-v-e57b8756="" class="input">
                      <div class="input-container"><input name="country" autocomplete="off" trim="true" type="text" class="input-control" value="{{$adress->country}}" required>
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <!---->
                    <!---->
                  </div>
                  <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                  </div>
                </div>
              </div>
              <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="city" class="form-item-title">Город</label>
                <div data-v-b31126bc="" class="field">
                  <div data-v-e57b8756="" data-v-684b9f47="" class="city-autocomplete" id="city" data-v-b31126bc="">
                    <div data-v-e57b8756="" class="input">
                      <div class="input-container"><input name="city" autocomplete="off" trim="true" type="text" class="input-control"  value="{{$adress->city}}" required>
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <!---->
                    <!---->
                  </div>
                  <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                  </div>
                </div>
              </div>
              <!---->
              <!---->
              <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="street" class="form-item-title">Улица</label>
                <div data-v-b31126bc="" class="field">
                  <div data-v-4f53bb6a="" data-v-684b9f47="" class="street-autocomplete margin-m" id="street" data-v-b31126bc="">
                    <div data-v-4f53bb6a="" class="input">
                      <div class="input-container"><input name="street" autocomplete="off" trim="true" type="text" class="input-control"  value="{{$adress->street}}" required>
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <!---->
                    <!---->
                  </div>
                  <div data-v-684b9f47="" data-v-b31126bc="" class="sub-fields-container sb margin-m">
                    <div data-v-684b9f47="" data-v-b31126bc="" class="sub-field"><label data-v-684b9f47="" data-v-b31126bc="" for="house" class="sub-field-label">Дом</label>
                      <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                        <div class="input-container"><input name="house" id="house" autocomplete="on" trim="true" type="text" class="input-control"  value="{{$adress->house}}" required>
                          <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                        </div>
                      </div>
                    </div>
                    <div data-v-684b9f47="" data-v-b31126bc="" class="sub-field"><label data-v-684b9f47="" data-v-b31126bc="" for="apartment" class="sub-field-label">Квартира/офис</label>
                      <div data-v-684b9f47="" class="input" data-v-b31126bc="">
                        <div class="input-container"><input name="room" id="room" autocomplete="on" trim="true" type="text" class="input-control"  value="{{$adress->room}}" required>
                          <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!---->
                  <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                  </div>
                </div>
              </div>
              <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="zipcode" class="form-item-title">Почтовый индекс</label>
                <div data-v-b31126bc="" class="field">
                  <div data-v-e57b8756="" data-v-684b9f47="" class="city-autocomplete" id="zipcode" data-v-b31126bc="">
                    <div data-v-e57b8756="" class="input">
                      <div class="input-container"><input name="zipcode" autocomplete="off" trim="true" type="text" class="input-control"  value="{{$adress->zipcode}}" required>
                        <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                      </div>
                    </div>
                    <!---->
                    <!---->
                  </div>
                  <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                  </div>
                </div>
              </div>
              <!---->
              <div data-v-684b9f47="" class="observer">
                <div data-v-b31126bc="" data-v-684b9f47="" class="form-item radio"><label data-v-b31126bc="" for="payment-type" class="form-item-title">Способ оплаты</label>
                  <div data-v-b31126bc="" class="field">
                    <div data-v-684b9f47="" class="radio-group" id="payment-type" ref="paymentType" data-v-b31126bc="">
                      <div data-v-08921c00="" class="radio"><input data-v-08921c00="" name="payment-type" id="payment-type-1" type="radio" class="radio-control" value="1" checked> <label data-v-08921c00="" for="payment-type-1" class="radio-label"><span data-v-08921c00="">Картой онлайн, Apple Pay, Google Pay</span></label></div>
                      <div data-v-08921c00="" class="radio"><input data-v-08921c00="" name="payment-type" id="payment-type-3" type="radio" class="radio-control" value="3"> <label data-v-08921c00="" for="payment-type-3" class="radio-label"><span data-v-08921c00="">Наличными курьеру</span></label></div>
                      <div data-v-08921c00="" class="radio"><input data-v-08921c00="" name="payment-type" id="payment-type-5" type="radio" class="radio-control" value="5"> <label data-v-08921c00="" for="payment-type-5" class="radio-label"><span data-v-08921c00="">Банковской картой курьеру</span></label></div>

                      <div data-v-70b16c7e="" class="error hidden"><span data-v-70b16c7e=""></span></div>
                    </div>
                    <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                </div>
              </div>
              <div data-v-b31126bc="" data-v-684b9f47="" class="form-item"><label data-v-b31126bc="" for="comment" class="form-item-title">Комментарий для&nbsp;менеджера</label>
                <div data-v-b31126bc="" class="field">
                  <div data-v-674e125c="" data-v-684b9f47="" class="input" data-v-b31126bc=""><textarea data-v-674e125c="" name="comment" id="comment" placeholder="Например: код домофона или номер подъезда" class="textarea-control"></textarea>
                    <div data-v-70b16c7e="" data-v-674e125c="" class="error hidden"><span data-v-70b16c7e=""></span>
                    </div>
                  </div>
                  <div data-v-70b16c7e="" data-v-b31126bc="" class="error hidden"><span data-v-70b16c7e=""></span>
                  </div>
                </div>
              </div>
              <div data-v-684b9f47="" role="modal" class="simplert">
                <div class="simplert__content">
                  <div class="simplert__header">
                    <!---->
                    <!----> <b class="simplert__title"></b>
                  </div>
                  <div class="simplert__body">
                    <div></div>
                  </div>
                  <div class="simplert__footer">
                    <!----> <button class="simplert__close">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div data-v-ea5ca2c8="" data-v-cfe42f2e="" class="sidebar-container">
              <div data-v-ea5ca2c8="" class="sidebar">
                <div data-v-ea5ca2c8="" class="links">
                  <!---->
                  @foreach($customer_articles as $c_article)
                  <div data-v-ea5ca2c8="" class="link-container"><a data-v-ea5ca2c8="" href="{{LaravelLocalization::localizeUrl(route('user.article', [
                        'slug' => $c_article->slug,
                        ]))}}" target="_blank" class="link">{{$c_article->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</a></div>
                  @endforeach
                </div>
                <div data-v-ea5ca2c8="" class="total">
                  <!-- <div data-v-ea5ca2c8="" class="total-item">
                    <div data-v-ea5ca2c8="" class="total-label">Доставка:</div>
                    <div data-v-ea5ca2c8="" class="total-value">490&nbsp;{{__('userpanel.currency')}}</div>
                  </div> -->
                  <!---->
                  <!---->
                  <!---->
                  <div data-v-ea5ca2c8="" class="total-item">
                    <div data-v-ea5ca2c8="" class="total-label">{{__('userpanel.total')}}:</div>
                    <div data-v-ea5ca2c8="" class="total-value big-text">{{$subtotal}} {{__('userpanel.currency')}}</div>
                  </div>
                  <!---->
                </div>

                <div data-v-ea5ca2c8="" class="buttons">
                  <button type="submit" data-v-6352a6b4="" data-v-ea5ca2c8="" class="button primary mobileFixed">Сформировать заказ и перейти к оплате</button>
                </div>
                <!-- <div data-v-ea5ca2c8="" class="buttons"><button data-v-6352a6b4="" data-v-ea5ca2c8="" class="button primary mobileFixed">Оплатить заказ</button></div> -->
                <div data-v-70b16c7e="" data-v-ea5ca2c8="" class="sidebar-error error hidden"><span data-v-70b16c7e=""></span></div>
                <div data-v-ea5ca2c8="" class="agreement">Нажимая на&nbsp;кнопку «<span>оплатить заказ</span>»,
                  я&nbsp;принимаю условия <a href="{{route('user.article', [
                    'slug' => 'public-offer',
                  ])}}" target="_blank">публичной оферты</a> и&nbsp;<a href="{{route('user.article', [
                    'slug' => 'privacy-policy',
                  ])}}" target="_blank">политики конфиденциальности</a></div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div data-v-cfe42f2e="" role="modal" class="simplert">
      <div class="simplert__content">
        <div class="simplert__header">
          <!---->
          <!----> <b class="simplert__title"></b>
        </div>
        <div class="simplert__body">
          <div></div>
        </div>
        <div class="simplert__footer">
          <!----> <button class="simplert__close">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/applepay.js')}}"></script>
<script src="{{asset('assets/js/cart.js')}}"></script>
<script src="{{asset('assets/js/yii.js')}}"></script>
{{-- <script src="{{asset('assets/js/chunks/vendor.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/chunks/layout-base.js')}}"></script> --}}
<script src="{{asset('assets/js/cart/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>

<script>
  function changeCount(event) { 
    var row_id = $(event.target).closest('.order-list__item').attr('row-id')
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('/card/change-count')}}",
      type: "post",
      data: {
        row_id: row_id,
        count: $(event.target).attr('count-changer'),
      },
      success: function(response) {
        console.log(response)
        
        var input = $(event.target).closest('.order-list__item').find('input')[0]
        console.log(input)
        input.value = response.qty
        var price = $(event.target).closest('.order-list__item').find('.goods__price')[0]
        price.innerText = response.total + ' {{__("userpanel.currency")}}'

        var total = $('.total-value')[0]
        total.innerText = response.subtotal + ' {{__("userpanel.currency")}}'
      }
    })
  }

  function removeCartItem(event) {
    var row_id = $(event.target).closest('.order-list__item').attr('row-id')
    

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('/card/remove-item')}}",
      type: "post",
      data: {
        row_id: row_id,
      },
      success: function(response) {
        var cartCount = document.getElementById('basket-count')
        console.log(response)
        if(response.count > 0) {
          cartCount.style.display = "block"            
        } else {
          cartCount.style.display = "none"
        }
        cartCount.innerHTML = response.count
        $(event.target).closest('.order-list__item').remove()
        var total = $('.total-value')[0]
        total.innerText = response.subtotal + ' {{__("userpanel.currency")}}'
      }
    })
  }

  $('#promocode_button').on('click', function(){
    $('#promocode_input').toggleClass('collapsed')
  })

  let standartHref = $('#promocode_link').attr('href')

  $('#promocode_changer').on("change paste keyup", function() {
    $('#promocode_link').prop('href', standartHref)
    $('#promocode_link').prop('href', $('#promocode_link').attr('href') + '/' + $(this).val())
  });

</script>
@endsection

@section('head')
<title>Корзина</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">

<link rel="stylesheet" href="{{asset('assets/css/applepay.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/cart/styles.css')}}">
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
<html lang="ru-RU" class="">
@endsection