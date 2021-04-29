<!DOCTYPE html>
@yield('html-class', '<html lang="ru-RU" class="">')

<head>

  @yield('head', '<div></div>')

</head>

<body>
  <div class="page  ">

    <nav class="menu second-variant site-menu">
      <div class="menu__middle">
        <div class="menu__holder">
          <div class="menu__scroll-content">
            <div class="menu__list">
              <div class="menu__column">

                @include('user.includes.header_categories', ['items'=>$categories_menu->roots()])

              </div>

              <div class="menu__column">
                <div class="menu__item" data-slug="info">
                  <a href="#" class="menu__link js-sub-menu">
                    <span class="menu__text">
                      Покупателям <i class="menu__sub-icon"></i>
                    </span>
                    <span class="menu__sub-icon-mobile"></span>
                  </a>
                  <ul class="menu__sub">
                    <li class="menu__sub-item">
                      <a href="/info/dostavka" class="menu__sub-link">
                        <span class="menu__text ">Доставка</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/info/vozvrattovar" class="menu__sub-link">
                        <span class="menu__text ">Возврат</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/support/support" class="menu__sub-link">
                        <span class="menu__text ">Вопросы и ответы</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/feedback/feedback" class="menu__sub-link">
                        <span class="menu__text ">Отзывы</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/contacts" class="menu__sub-link">
                        <span class="menu__text ">Связаться с нами</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="menu__column">
                <div class="menu__item" data-slug="about">
                  <a href="#" class="menu__link js-sub-menu">
                    <span class="menu__text">
                      О компании <i class="menu__sub-icon"></i>
                    </span>
                    <span class="menu__sub-icon-mobile"></span>
                  </a>
                  <ul class="menu__sub">
                    <li class="menu__sub-item">
                      <a href="/about/brand" class="menu__sub-link">
                        <span class="menu__text ">О нас</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/contacts" class="menu__sub-link">
                        <span class="menu__text ">Контакты</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/press" class="menu__sub-link">
                        <span class="menu__text ">Пресса о нас</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/rabota-u-nas" class="menu__sub-link">
                        <span class="menu__text ">Карьера</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/office" class="menu__sub-link">
                        <span class="menu__text ">Офис</span>
                      </a>
                    </li>
                    <li class="menu__sub-item">
                      <a href="/about/stories" class="menu__sub-link">
                        <span class="menu__text ">Блог</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="menu__column menu__column_desktop">
                <div class="menu__item">
                  <div class="search menu__search-item">
                    <form id="search" class="search__form" method="get" action="/catalog/search" ">
                  <input type=" text" name="search" placeholder="найти на сайте" autocomplete="off" class="search__input" value="" />
                    <button type="submit" class="search__button"><i class="search__icon"></i></button>
                    </form>
                  </div>
                </div>
                <div data-dkey="login"></div>
                @if(LaravelLocalization::getCurrentLocale() == 'ru')
                <a class="menu__english-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                  <span>English version</span>
                </a>
                @else
                <a class="menu__english-link" href="{{ LaravelLocalization::getLocalizedURL('ru') }}">
                  <span>Русская версия</span>
                </a>
                @endif
                
              </div>
            </div>

            <div class="menu__contact">
              <div class="menu__contact-item">
                <a class="menu__contact-link" href="https://api.whatsapp.com/send?phone=79126156257" target="_blank">
                  <i class="menu__contact-icon wa"></i>
                  <span class="menu__contact-label">WhatsApp</span>
                </a>
              </div>
              <div class="menu__contact-item">
                <a class="menu__contact-link" href="https://www.messenger.com/t/domnadereve" target="_blank">
                  <i class="menu__contact-icon fb"></i>
                  <span class="menu__contact-label">Facebook</span>
                </a>
              </div>
              <div class="menu__contact-item">
                <a class="menu__contact-link" href="tg://resolve?domain=twelvestoreez_bot">
                  <i class="menu__contact-icon tg"></i>
                  <span class="menu__contact-label">Telegram</span>
                </a>
              </div>
              <div class="menu__contact-item">
                <a class="menu__contact-link" href="mailto:info@domnadereve.com">
                  <i class="menu__contact-icon mail"></i>
                  <span class="menu__contact-label">E-mail</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="menu__bottom">
        <div class="menu__holder">
          <div class="menu__tools">
            <div class="menu__tools-item menu__tools-item--globus">
              @if(LaravelLocalization::getCurrentLocale() == 'ru')
              <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="menu__tools-button menu__tools-button_globus">
                <span class="menu__tools-button-icon menu__tools-button-icon--globus"></span>
                <span class="menu__tools-button-text">English</span>
              </a>
              @else
              <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}" class="menu__tools-button menu__tools-button_globus">
                <span class="menu__tools-button-icon menu__tools-button-icon--globus"></span>
                <span class="menu__tools-button-text">Русский язык</span>
              </a>
              @endif

            </div>

            <div class="menu__tools-item  menu__tools-item--user">
              <a href="/user/cabinet" class="menu__tools-button menu__tools-button_user">
                <span class="menu__tools-button-icon menu__tools-button-icon--user"></span>
                <span class="menu__tools-button-text">Профиль</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="page  ">
      <header class="header ">
        <div class="header__holder">
          <div class="header__line">
            <div class="header__left-panel">
              <a href="javascript:history.back()" class="back-button">
                <div class="back-button__holder"><i class="back-button__icon"></i></div>
              </a>

              <div class="menu-button js-menu-button-second">
                <div class="menu-button__holder">
                  <div class="menu-button__line menu-button__line_top"></div>
                  <div class="menu-button__line menu-button__line_middle"></div>
                  <div class="menu-button__line menu-button__line_bottom"></div>
                </div>
              </div>

              <a href="/catalog?search=" class="header-search header-search--left"><i class="header-search__icon"></i></a>

              <ul class="header-links">
                @foreach($mainmenu_categories as $main_category)
                <li class="header-links__item"><a href="{{route('user.category', $main_category->id)}}" class="header-link">{{$main_category->title}}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="logo ">
              <a href="/" class="logo__link">
                Дом на дереве
              </a>
            </div>
            <div data-url="" data-uptitle="вверх" class="header__title js-scroll-top">^</div>
            <div class="header__right-panel">

              <a href="/catalog?search=" class="header-search header-search--right">
                <i class="header-search__icon"></i>
              </a>
              <a href="/user/wishlist" class="favorite-button">
                <i class="favorite-button__icon">
                  <span class="favorite-button__count" data-dkey="wishlist" style="display: none"></span>
                </i>
              </a>
              <a href="/user/cabinet" class="header-user">
                <i class="header-user__icon"></i>
              </a>
              <a href="/cart" class="basket-button">
                <i class="basket-button__icon" data-ga-action="Bag icon click" data-ga-category="Checkout" data-ga-label="Пользователь залогинен">
                  <span class="basket-button__count" data-dkey="cart" style="display: none"></span>
                </i>
              </a>
            </div>
          </div>
        </div>
      </header>

      <main class="main">


        @yield('content', '<div></div>')


      </main>


      <footer class="footer " id="footer">
        <div class="footer__holder">
          <div class="page__row">


            <div class="subscribe footer__subscribe media-query-show_mobile">

              <form class="subscribe-form " action="/subscribe-ajax" method="POST">
                <div class="subscribe-form__settings" data-platform="mobile" data-crm="PodpiskaIzPodvala" data-source="footer_mobile"></div>
                <div class="subscribe-form__screen visible" data-name="contacts">
                  <div class="subscribe-form__title">Узнайте первыми о&nbsp;новинках и&nbsp;скидках</div>
                  <div class="subscribe-form__field">
                    <input class="subscribe-form__input" type="text" name="email" maxlength="255" autocomplete="off" placeholder="Адрес эл. почты" />
                  </div>
                  <div class="subscribe-form__button subscribe-form__button--mail subscribe-form__js-submit">
                    <span>Подписаться</span>
                  </div>
                  <p class="subscribe-form__privacy">Нажимая на&nbsp;кнопку «Подписаться», я&nbsp;соглашаюсь
                    на&nbsp;обработку моих персональных данных и&nbsp;ознакомлен(а) с&nbsp;<a href="/r/privacy_policy">условиями конфиденциальности</a>.</p>
                </div>

                <div class="subscribe-form__screen" data-name="subscriptions">
                  <div class="subscribe-form__title">Какие рассылки <br />вы хотели бы получать?</div>
                  <div class="subscribe-form__field subscribe-form__radioset">
                    <div class="subscribe-form__radio">
                      <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="Women" />
                      <span class="subscribe-form__radio-selector"></span>
                      <label class="subscribe-form__radio-label">Женская коллекция</label>
                    </div>
                    <div class="subscribe-form__radio">
                      <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="Men" />
                      <span class="subscribe-form__radio-selector"></span>
                      <label class="subscribe-form__radio-label">Мужская коллекция</label>
                    </div>
                    <div class="subscribe-form__radio">
                      <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="All" />
                      <span class="subscribe-form__radio-selector"></span>
                      <label class="subscribe-form__radio-label">Обе</label>
                    </div>
                  </div>
                </div>

                <div class="subscribe-form__screen" data-name="success">
                  <div class="subscribe-form__title">Спасибо! <br />Вы подписаны</div>
                </div>
              </form>
            </div>

            <div class="page__middle">

              <nav class="bottom-menu media-query-show-footer_tablet">

                <!-- Новый футер start -->
                <div class="footer-col">
                  <div class="footer-col__item footer-col-item" data-slug="info">
                    <span class="footer-col-item__title"><i class="arrow-icon"></i>Покупателям</span>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item" data-slug="support" data-rank="">
                        <a class="footer-list-item__link" href="/support/support">
                          Вопросы и ответы </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="vozvrattovar" data-rank="3">
                        <a class="footer-list-item__link" href="/info/vozvrattovar">
                          Возврат </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="dostavka" data-rank="5">
                        <a class="footer-list-item__link" href="/info/dostavka">
                          Доставка </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="dostavka" data-rank="5">
                        <a class="footer-list-item__link" href="/info/dostavka">
                          Отзывы </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="dostavka" data-rank="5">
                        <a class="footer-list-item__link" href="/info/dostavka">
                          Мы на YouTube </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="dostavka" data-rank="5">
                        <a class="footer-list-item__link" href="/info/dostavka">
                          Оптовые продажи </a>
                      </li>
                    </ul>
                  </div>
                  <div class="footer-col__item footer-col-item" data-slug="about">
                    <span class="footer-col-item__title"><i class="arrow-icon"></i>О компании</span>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item" data-slug="brand" data-rank="12">
                        <a class="footer-list-item__link" href="/about/brand">
                          О нас </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="office" data-rank="13">
                        <a class="footer-list-item__link" href="/about/office">
                          Офис </a>
                      </li>
                      <li class="footer-list__item footer-list-item" data-slug="contacts" data-rank="14">
                        <a class="footer-list-item__link" href="/about/contacts">
                          Контакты </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="footer-col">
                  <div class="footer-col__item footer-col-item footer-col-item--connect">
                    <span class="footer-col-item__title"><i class="arrow-icon"></i>Задайте вопрос</span>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--wa" target="_blank" href="https://api.whatsapp.com/send?phone=79126156257">
                          WhatsApp
                        </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--email" target="_blank" href="mailto:info@domnadereve.com">
                          Эл. почта </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--telegram" target="_blank" href="tg://resolve?domain=twelvestoreez_bot">
                          Telegram
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="footer-col__item footer-col-item">
                    <a href="/user/cabinet" class="footer-col-item__title"><i class="arrow-icon"></i>Мой кабинет</a>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="/user/cabinet">
                          Профиль </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="/user/orders">
                          Мои заказы </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="/user/subscribe">
                          Мои подписки </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="/user/wishlist">
                          Wishlist </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="footer-col">
                  <div class="bottom-menu__item bottom-menu__item_subscribe">

                    <form class="subscribe-form " action="/subscribe-ajax" method="POST">
                      <div class="subscribe-form__settings" data-platform="desktop" data-crm="PodpiskaIzPodvala" data-source="footer_desktop"></div>
                      <div class="subscribe-form__screen visible" data-name="contacts">
                        <div class="subscribe-form__title">Узнайте первыми о&nbsp;новинках и&nbsp;скидках</div>
                        <div class="subscribe-form__field">
                          <input class="subscribe-form__input" type="text" name="email" maxlength="255" autocomplete="off" placeholder="Адрес эл. почты" />
                        </div>
                        <div class="subscribe-form__button subscribe-form__button--mail subscribe-form__js-submit">
                          <span>Подписаться</span>
                        </div>
                        <p class="subscribe-form__privacy">Нажимая на&nbsp;кнопку «Подписаться», я&nbsp;соглашаюсь
                          на&nbsp;обработку моих персональных данных и&nbsp;ознакомлен(а) с&nbsp;<a href="/r/privacy_policy">условиями конфиденциальности</a>.</p>
                      </div>

                      <div class="subscribe-form__screen" data-name="subscriptions">
                        <div class="subscribe-form__title">Какие рассылки <br />вы хотели бы получать?</div>
                        <div class="subscribe-form__field subscribe-form__radioset">
                          <div class="subscribe-form__radio">
                            <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="Women" />
                            <span class="subscribe-form__radio-selector"></span>
                            <label class="subscribe-form__radio-label">Женская коллекция</label>
                          </div>
                          <div class="subscribe-form__radio">
                            <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="Men" />
                            <span class="subscribe-form__radio-selector"></span>
                            <label class="subscribe-form__radio-label">Мужская коллекция</label>
                          </div>
                          <div class="subscribe-form__radio">
                            <input class="subscribe-form__radio-input subscribe-form__js-submit" type="radio" name="gender" value="All" />
                            <span class="subscribe-form__radio-selector"></span>
                            <label class="subscribe-form__radio-label">Обе</label>
                          </div>
                        </div>
                      </div>

                      <div class="subscribe-form__screen" data-name="success">
                        <div class="subscribe-form__title">Спасибо! <br />Вы подписаны</div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Новый футер end -->

              </nav>
            </div>
          </div>

          


          <div class="footer-line page__middle">
            <div class="footer-line__inn footer-line-inn">
              <div class="footer-line-inn__left">
                <div class="reference-tools">

                  @if(LaravelLocalization::getCurrentLocale() == 'ru')
                  <div class="reference-tools__item"> <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="reference-tools__link en-US">
                      <i class="reference-tools__icon reference-tools__icon_lang"></i>English version </a>
                  </div>
                  @else
                  <div class="reference-tools__item"> <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}" class="reference-tools__link en-US">
                      <i class="reference-tools__icon reference-tools__icon_lang"></i>Русская версия </a>
                  </div>
                  @endif
                </div>
              </div>
              <div class="footer-line-inn__center footer-socials">
                <h4 class="footer-socials__title">
                  Мы в соцсетях </h4>
                <ul class="footer-socials__list footer-socials-list">
                  <li class="footer-socials-list__item footer-socials-list-item">
                    <a class="footer-socials-list-item__link footer-socials-list-item__link--youtube " href="https://www.youtube.com/channel/UCUCmIasCXPKOLreAUXZhHtw/" target="_blank" rel="nofollow"></a>
                  </li>
                  <li class="footer-socials-list__item footer-socials-list-item">
                    <a class="footer-socials-list-item__link footer-socials-list-item__link--facebook " href="https://www.facebook.com/domnadereve" target="_blank" rel="nofollow"></a>
                  </li>
                  <li class="footer-socials-list__item footer-socials-list-item">
                    <a class="footer-socials-list-item__link footer-socials-list-item__link--instagram " href="https://www.instagram.com/domnadereve/" target="_blank" rel="nofollow"></a>
                  </li>
                </ul>
              </div>
              <div class="footer-line-inn__right">
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>


  </div>

  @yield('scripts', '<script></script>')

</body>

</html>