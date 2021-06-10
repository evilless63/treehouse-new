@extends('user.layouts.main')

@section('content')
<div class="profile">
  <div class="profile-head profile__head">
    <div class="profile-head__background"></div>
    <div class="profile-head__holder">
      <div class="page__row">

        @include('user.includes.profile-nav')

        <div class="page__middle">
          <div class="profile-head__title">
            <div class="profile-head__name"> </div>
            <a href="/user/edit" class="profile-head__edit"><i class="profile-head__edit-icon"></i><span class="profile-head__edit-text">редактировать профиль</span></a>
          </div>
          <div class="profile-head__box-wrapper">
            <div class="profile-head__box">
              <div class="profile-info profile-head__info">
                <div class="profile-info__background"></div>
                <div class="profile-info__list">
                  <div class="profile-info__item">{{$user->email}}</div>
                  <div class="profile-info__item"></div>
                  <div class="profile-info__item"></div>
                </div>
                <div class="profile-info__detail">
                  <div class="profile-info__detail-column profile-info__detail-column_3">
                    <div class="profile-info__detail-title">контактная информация</div>
                    <div class="profile-info__detail-item">{{$user->email}}</div>
                    <div class="profile-info__detail-item">{{$user->phone}}</div>
                  </div>
                  <div class="profile-info__detail-column profile-info__detail-column_3">
                    <div class="profile-info__detail-title">основной адрес доставки</div>
                    <div class="profile-info__detail-item">{{$default_adress == null ? 'Не задан' : $default_adress}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="profile-head__handle js-profile-handle" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><i class="profile-head__handle-icon"></i></div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="profile__holder">
    <div class="page__row">
      <div class="page__middle">


        <div class="profile__list">
          <h2 class="profile__title">Бонусы</h2>
          <div class="bonus-list">
            <div class="bonus-list__holder">
              <div class="bonus-list__empty">У вас пока нет бонусов</div>
            </div>
          </div>
        </div>
        <div class="profile__list">
          <div class="bonus-faq">
            <div class="bonus-faq__holder">
              <div class="bonus-faq__list accordion js-accordion">
                <div class="accordion__item">
                  <div class="accordion__head">
                    <div class="bonus-faq__line">
                      <div class="bonus-faq__title accordion__title">Как это работает?</div>
                      <div class="accordion__icon profile-orders__icon"></div>
                    </div>
                  </div>
                  <div class="bonus-faq__box accordion__box" style="display: none;">
                    <p>За покупку, совершенную в Интернет-магазине, начисляются Бонусные баллы, из расчета 3 (Три) балла за каждые 100 (Сто) рублей от стоимости выкупленного товара, без учета стоимости доставки, после применения всех действующих скидок.</p>

                    <p>Бонусные баллы списываются из расчета 1 балл за 1 рубль. Пользователь вправе оплатить Бонусными баллами не более 50% (пятьдесят процентов) стоимости товара. Бонусная программа не распространяется на услуги по доставке товаров Пользователю. Оставшиеся 50% (пятьдесят процентов) стоимости онлайн заказа или покупки в розничных магазинах Пользователь оплачивает: в Интернет-магазине любым доступным для региона способом оплаты (наличными или картой при получении курьеру, онлайн на сайте), в розничных магазинах – наличными или картой на кассе.</p>

                    <p>Бонусные баллы, накопленные Пользователем и не потраченные им в созданном онлайн заказе или покупке в розничных магазинах, остаются на его Бонусном счете.</p>
                  </div>
                </div>
                <div class="accordion__item">
                  <div class="accordion__head">
                    <div class="bonus-faq__line">
                      <div class="bonus-faq__title accordion__title">Что такое активные и неактивные бонусы?</div>
                      <div class="accordion__icon profile-orders__icon"></div>
                    </div>
                  </div>
                  <div class="bonus-faq__box accordion__box">
                    <p>Активные бонусы - это бонусные баллы, которые начислены за выкупленные вещи спустя 14 дней с момента доставки. Активные бонусы можно тратить на последующие заказы.</p>

                    <p>&nbsp;</p>

                    <p>Неактивые бонусы - это бонусные баллы, которые заблокированы до истечения времени с момента оформления заказа до его выкупа (выкуп с учетом 14 дней с момента доставки заказа).</p>
                  </div>
                </div>
                <div class="accordion__item">
                  <div class="accordion__head">
                    <div class="bonus-faq__line">
                      <div class="bonus-faq__title accordion__title">Оплата бонусами</div>
                      <div class="accordion__icon profile-orders__icon"></div>
                    </div>
                  </div>
                  <div class="bonus-faq__box accordion__box">
                    <p>Оплатить до 50% стоимость заказа возможно только активными бонусами. Чтобы воспользоваться бонусами введите количество бонусных баллов, которое хотите применить, в поле "Применить бонусные баллы" при оформлении заказа. (при условии, что у вас есть активные бонусы)</p>
                  </div>
                </div>
                <div class="accordion__item">
                  <div class="accordion__head">
                    <div class="bonus-faq__line">
                      <div class="bonus-faq__title accordion__title">Сколько бонусов я получу за покупку?</div>
                      <div class="accordion__icon profile-orders__icon"></div>
                    </div>
                  </div>
                  <div class="bonus-faq__box accordion__box">
                    <p>За каждые потраченные 100 рублей в заказе вам будет начислено 3 бонусных балла</p>
                  </div>
                </div>
              </div>
              <!--      <div class="bonus-faq__bottom"><a href="#" class="bonus-faq__more-link">Подробные условия</a></div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <a href="/user/logout" class="button button_transparent profile__exit-button">Выход</a> --}}
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
<link rel="stylesheet" href="{{asset('assets/js/base/styles.css')}}">
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