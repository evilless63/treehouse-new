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
                      {{__('userpanel.customers')}} <i class="menu__sub-icon"></i>
                    </span>
                    <span class="menu__sub-icon-mobile"></span>
                  </a>
                  <ul class="menu__sub">
                    @foreach($customer_articles as $c_article)
                    <li class="menu__sub-item">
                      <a href="{{LaravelLocalization::localizeUrl(route('user.article', [
                        'slug' => $c_article->slug,
                        ]))}}" class="menu__sub-link">
                        <span class="menu__text "> {{$c_article->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span></a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>

              <div class="menu__column">
                <div class="menu__item" data-slug="about">
                  <a href="#" class="menu__link js-sub-menu">
                    <span class="menu__text">
                      {{__('userpanel.company')}} <i class="menu__sub-icon"></i>
                    </span>
                    <span class="menu__sub-icon-mobile"></span>
                  </a>
                  <ul class="menu__sub">
                    @foreach($company_articles as $article)
                    <li class="menu__sub-item">
                      <a href="{{LaravelLocalization::localizeUrl(route('user.article', [
                        'slug' => $article->slug,
                        ]))}}" class="menu__sub-link">
                        <span class="menu__text ">{{$article->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</span></a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>

              <div class="menu__column menu__column_desktop">
                <div class="menu__item">
                  <div class="search menu__search-item">
                    <form id="search" class="search__form" method="get" action="/catalog/search" ">
                  <input type=" text" name="search" placeholder="{{__('userpanel.find_on_site_placeholder')}}" autocomplete="off" class="search__input" value="" />
                    <button type="submit" class="search__button"><i class="search__icon"></i></button>
                    </form>
                  </div>
                </div>
                <div data-dkey="login"></div>
                @if(LaravelLocalization::getCurrentLocale() == 'ru')
                <a class="menu__english-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                  <span>{{__('userpanel.english')}}</span>
                </a>
                @else
                <a class="menu__english-link" href="{{ LaravelLocalization::getLocalizedURL('ru') }}">
                  <span>{{__('userpanel.russian')}}</span>
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
                <span class="menu__tools-button-text">{{__('userpanel.english')}}</span>
              </a>
              @else
              <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}" class="menu__tools-button menu__tools-button_globus">
                <span class="menu__tools-button-icon menu__tools-button-icon--globus"></span>
                <span class="menu__tools-button-text">{{__('userpanel.russian')}}</span>
              </a>
              @endif

            </div>

            <div class="menu__tools-item  menu__tools-item--user">
              <a href="{{LaravelLocalization::localizeUrl('/user/cabinet')}}" class="menu__tools-button menu__tools-button_user">
                <span class="menu__tools-button-icon menu__tools-button-icon--user"></span>
                <span class="menu__tools-button-text">{{__('userpanel.lc_profile')}}</span>
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
                <li class="header-links__item"><a href="{{route('user.category', $main_category->slug)}}" class="header-link">{{$main_category->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="logo ">
              <a href="{{LaravelLocalization::localizeUrl('/')}}" class="logo__link">
                <svg style="width: 60%;" viewBox="0 0 510 221" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>Дом на дереве</title>
                  <g id="Page-2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Artboard-Copy-43" transform="translate(-543.000000, -887.000000)" fill="#ad8f60" fill-rule="nonzero">
                      <g id="Group" transform="translate(543.612841, 887.612574)">
                        <path d="M313.746765,172.588056 L313.899139,172.604522 L330.724056,175.025106 C331.726656,175.16935 332.483856,175.992638 332.55707,176.988769 L332.562882,177.147415 L332.562024,199.268441 L340.059922,199.57675 C341.156668,199.621818 342.03308,200.485088 342.110487,201.563626 L342.116048,201.719102 L342.116048,217.602482 C342.116048,218.78667 341.156074,219.747012 339.971887,219.747012 C338.839186,219.747012 337.911626,218.868331 337.83311,217.75561 L337.827726,217.602482 L337.827159,203.776426 L300.915159,202.259426 L299.581849,217.785965 C299.48492,218.914511 298.530455,219.763509 297.415097,219.747012 L297.262071,219.738778 C296.133525,219.641849 295.284527,218.687384 295.300788,217.572026 L295.309258,217.418999 L296.818222,199.850107 C296.911914,198.759255 297.809234,197.923191 298.88737,197.890399 L299.042553,197.891238 L306.525024,198.198441 L311.494513,174.290482 C311.714519,173.232026 312.684084,172.511133 313.746765,172.588056 Z M410.045067,185.322407 C411.542597,193.737736 406.560061,201.64231 398.916224,202.977805 C394.675106,203.718757 390.505799,202.281748 387.378433,199.418128 L389.016898,217.408094 C389.124256,218.587404 388.255267,219.630455 387.075956,219.737813 C385.94792,219.840503 384.944552,219.0499 384.765481,217.94888 L384.746237,217.796871 L381.13551,178.133594 C381.028152,176.954283 381.897141,175.911232 383.076452,175.803874 C384.15701,175.705506 385.123173,176.426818 385.359988,177.455478 C387.361743,174.898216 390.176951,173.082533 393.493021,172.503165 C401.136869,171.167733 408.547451,176.907093 410.045067,185.322407 Z M214.401337,172.36889 L214.561778,172.371162 C215.693008,172.428872 216.574615,173.353301 216.596337,174.468578 L216.593912,174.62178 L216.058693,185.103327 L231.463693,186.360327 L231.110517,176.527153 L231.110386,176.373931 C231.148803,175.259105 232.04415,174.347977 233.176117,174.307209 C234.308083,174.266441 235.266654,175.1108 235.385169,176.219974 L235.39606,176.372808 L236.281695,200.959764 L236.281695,201.112986 C236.243278,202.227812 235.347932,203.13894 234.215965,203.179708 C233.083998,203.220476 232.125427,202.376117 232.006912,201.266943 L231.996021,201.114108 L231.619693,190.675327 L215.839693,189.387327 L215.22828,201.390985 L215.215102,201.543639 C215.079996,202.650915 214.108892,203.480829 212.977662,203.423119 C211.846432,203.365409 210.964826,202.44098 210.943103,201.325703 L210.945528,201.172501 L212.31116,174.403295 L212.324339,174.250641 C212.453011,173.196093 213.339958,172.393121 214.401337,172.36889 Z M250.527769,172.054754 C256.970721,172.812599 261.796364,175.908304 264.799622,181.250736 C267.758942,186.515006 268.175469,193.301923 266.163391,201.545362 C265.882595,202.695776 264.72237,203.400741 263.571956,203.119945 C262.674758,202.900955 262.048495,202.147069 261.949468,201.280102 C259.720121,202.591031 256.954486,203.366288 253.958873,203.366288 C246.570854,203.366288 240.581682,198.650761 240.581682,192.833864 C240.581682,187.016967 246.570854,182.30144 253.958873,182.30144 C256.73713,182.30144 259.317572,182.968276 261.456094,184.109754 C261.332183,183.851277 261.200303,183.599112 261.06147,183.352145 C258.744348,179.230265 255.134488,176.914499 250.026813,176.313714 C248.850734,176.175379 248.009476,175.109836 248.147811,173.933756 C248.286146,172.757677 249.351689,171.916419 250.527769,172.054754 Z M508.47995,181.921487 C508.700419,182.910477 508.198466,183.910106 507.293309,184.331375 L507.138771,184.396131 L487.931159,191.584426 L487.95078,191.638234 C488.865316,194.058045 490.440806,195.905962 492.532599,197.123417 L492.786083,197.266482 C496.258685,199.166398 500.734439,199.11163 504.173478,197.152985 C505.20248,196.566935 506.511738,196.926018 507.097788,197.95502 C507.683838,198.984022 507.324755,200.29328 506.295753,200.87933 C501.568932,203.571409 495.511037,203.645538 490.727795,201.028549 C485.405302,198.116527 482.393767,192.395868 482.792205,184.927347 C483.203083,177.225655 488.3192,172.675538 495.116405,172.584001 C501.367527,172.499819 507.221462,176.276131 508.47995,181.921487 Z M443.05118,181.921487 C443.27165,182.910477 442.769696,183.910106 441.864539,184.331375 L441.710001,184.396131 L422.502159,191.584426 L422.52201,191.638234 C423.436546,194.058045 425.012037,195.905962 427.103829,197.123417 L427.357313,197.266482 C430.829915,199.166398 435.305669,199.11163 438.744708,197.152985 C439.77371,196.566935 441.082968,196.926018 441.669018,197.95502 C442.255068,198.984022 441.895985,200.29328 440.866983,200.87933 C436.140162,203.571409 430.082267,203.645538 425.299025,201.028549 C419.976532,198.116527 416.964997,192.395868 417.363435,184.927347 C417.774313,177.225655 422.89043,172.675538 429.687635,172.584001 C435.938757,172.499819 441.792693,176.276131 443.05118,181.921487 Z M372.849508,181.921487 C373.069978,182.910477 372.568024,183.910106 371.662868,184.331375 L371.508329,184.396131 L352.301159,191.584426 L352.320338,191.638234 C353.234875,194.058045 354.810365,195.905962 356.902157,197.123417 L357.155641,197.266482 C360.628244,199.166398 365.103997,199.11163 368.543037,197.152985 C369.572039,196.566935 370.881297,196.926018 371.467347,197.95502 C372.053397,198.984022 371.694313,200.29328 370.665312,200.87933 C365.93849,203.571409 359.880595,203.645538 355.097354,201.028549 C349.77486,198.116527 346.763326,192.395868 347.161764,184.927347 C347.572641,177.225655 352.688758,172.675538 359.485963,172.584001 C365.737086,172.499819 371.591021,176.276131 372.849508,181.921487 Z M468.841176,153.923061 C476.038084,156.804898 479.254083,165.563454 476.024422,173.486023 C474.456233,177.332451 471.656973,180.274637 468.368033,181.954153 C468.889346,182.320692 469.398171,182.72463 469.890013,183.163801 C475.398693,188.083342 476.690542,195.560427 472.775405,199.864699 C468.859944,204.16868 461.220141,203.669963 455.71107,198.750856 C450.20239,193.831314 448.910541,186.35423 452.825678,182.049957 C453.221222,181.615165 453.654773,181.229385 454.120296,180.892224 C449.11226,177.061183 447.227908,169.756246 449.961625,163.050261 C453.191603,155.12782 461.644174,151.041457 468.841176,153.923061 Z M315.282159,177.135426 L310.867024,198.376441 L328.274159,199.092441 L328.274159,179.004426 L315.282159,177.135426 Z M253.958873,186.589762 C248.744679,186.589762 244.870003,189.640457 244.870003,192.833864 C244.870003,196.027271 248.744679,199.077966 253.958873,199.077966 C259.173067,199.077966 263.047743,196.027271 263.047743,192.833864 C263.047743,189.640457 259.173067,186.589762 253.958873,186.589762 Z M394.231068,176.727503 C389.021905,177.637623 385.4891,183.242259 386.58617,189.407215 C387.685025,195.581835 392.957802,199.665502 398.178176,198.753467 C403.301944,197.858267 406.803864,192.421208 405.87329,186.376462 L405.823058,186.073758 C404.724219,179.899135 399.451442,175.815468 394.231068,176.727503 Z M460.094258,183.404411 C458.410269,183.37903 456.93831,183.901916 455.997975,184.935565 C453.86019,187.285817 454.690152,192.089605 458.56734,195.552152 C462.464425,199.031887 467.440151,199.356687 469.603108,196.979092 C471.699782,194.674036 470.941755,190.008905 467.253856,186.5637 L467.033668,186.362588 C465.246301,184.766566 463.232014,183.834236 461.366267,183.521928 C460.941972,183.50497 460.517486,183.465349 460.094258,183.404411 Z M430.02972,176.871799 L429.74538,176.871934 C425.136325,176.934003 421.932269,179.783591 421.645667,185.1558 C421.610934,185.806852 421.607037,186.436809 421.632818,187.045201 L421.647159,187.326426 L438.187159,181.135426 C436.778891,178.708771 433.721689,177.020392 430.346988,176.880366 L430.02972,176.871799 Z M495.45849,176.871799 L495.17415,176.871934 C490.565094,176.934003 487.361039,179.783591 487.074437,185.1558 C487.039704,185.806852 487.035807,186.436809 487.061588,187.045201 L487.076159,187.325426 L503.616159,181.135426 C502.207668,178.708771 499.15046,177.020392 495.775758,176.880366 L495.45849,176.871799 Z M359.828048,176.871799 L359.543708,176.871934 C354.934653,176.934003 351.730597,179.783591 351.443995,185.1558 C351.409262,185.806852 351.405365,186.436809 351.431146,187.045201 L351.445159,187.325426 L367.985159,181.135426 C366.577209,178.708771 363.520017,177.020392 360.145316,176.880366 L359.828048,176.871799 Z M453.932668,164.669116 C451.567056,170.472121 453.843521,176.671908 458.738889,178.632145 C459.339465,178.872609 459.956578,179.040237 460.581554,179.138625 C460.936991,179.15595 461.29538,179.189447 461.655486,179.238246 C465.746684,179.374125 469.960685,176.684546 471.933717,172.150986 L472.053378,171.867168 C474.41899,166.064162 472.142525,159.864376 467.247157,157.904139 C462.330648,155.935618 456.305819,158.848294 453.932668,164.669116 Z" id="Shape"></path>
                        <path d="M69.5894003,0.0317902003 L69.8262589,0.0598618845 L137.182866,9.30275119 C140.266011,9.72583018 142.583116,12.3048096 142.697045,15.3918748 L142.701439,15.6303157 L142.701,105.38 L174.29793,106.398872 C177.666842,106.507456 180.357106,109.210926 180.47501,112.553545 L180.479041,112.782418 L180.479041,201.656098 C180.479041,205.183465 177.619545,208.04296 174.092179,208.04296 C170.641495,208.04296 167.829959,205.306439 167.709349,201.885175 L167.705318,201.656098 L167.705159,118.966426 L137.783162,118.002515 C137.311641,118.113468 136.819964,118.172168 136.314577,118.172168 C135.664826,118.172168 135.037735,118.075143 134.447004,117.894791 L18.0261594,114.141426 L12.756067,184.297833 C12.4975142,187.738817 9.55802334,190.337407 6.13733924,190.20133 L5.90860489,190.188186 C2.46762071,189.929633 -0.130969557,186.990142 0.00510795562,183.569458 L0.0182519152,183.340724 L5.74818207,107.083177 C5.99869486,103.749194 8.77307532,101.186741 12.0905335,101.174854 L12.3228403,101.178186 L39.011,102.038 L62.7536263,4.87147324 C63.5114151,1.77006985 66.436573,-0.283026193 69.5894003,0.0317902003 Z M478.20019,8.47684433 L478.256908,8.71251471 L507.16727,138.801744 C507.932504,142.245104 505.761455,145.656844 502.318095,146.422079 C498.951254,147.170308 495.614644,145.111305 494.752668,141.800558 L494.69776,141.572904 L468.791159,25.0024264 L400.531493,115.62791 C397.324084,119.886206 390.65887,118.559756 389.273061,113.485329 L389.212881,113.24847 L369.068159,27.6574264 L300.122161,152.065247 C298.451182,155.080377 294.700701,156.213788 291.651452,154.667862 L291.439886,154.555649 C288.424756,152.884671 287.291345,149.134189 288.837271,146.08494 L288.949484,145.873374 L365.911602,7.00215832 C368.701877,1.96735711 376.15997,2.92160557 377.653787,8.39415161 L377.714945,8.63493099 L398.525159,97.0594264 L466.920546,6.25549093 C470.150812,1.96685019 476.870064,3.34871037 478.20019,8.47684433 Z M241.6907,14.1938653 C271.421358,14.1938653 295.522817,39.5077879 295.522817,70.7340939 C295.522817,101.9604 271.421358,127.274323 241.6907,127.274323 C211.960043,127.274323 187.858584,101.9604 187.858584,70.7340939 C187.858584,39.5077879 211.960043,14.1938653 241.6907,14.1938653 Z M241.6907,26.9675879 C219.158813,26.9675879 200.632306,46.4261001 200.632306,70.7340939 C200.632306,95.0420878 219.158813,114.5006 241.6907,114.5006 C264.222588,114.5006 282.749095,95.0420878 282.749095,70.7340939 C282.749095,46.4261001 264.222588,26.9675879 241.6907,26.9675879 Z M73.7951594,13.4974264 L52.058,102.459 L129.927159,104.968 L129.927159,21.2004264 L73.7951594,13.4974264 Z" id="Shape"></path>
                      </g>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
            <!-- <div data-url="" data-uptitle="вверх" class="header__title js-scroll-top">^</div> -->
            <div class="header__right-panel">

              <a href="{{LaravelLocalization::localizeUrl('/catalog?search=')}}" class="header-search header-search--right">
                <i class="header-search__icon"></i>
              </a>
              <a href="{{LaravelLocalization::localizeUrl('/user/wishlist')}}" class="favorite-button">
                <i class="favorite-button__icon">
                  <span class="favorite-button__count" data-dkey="wishlist" style="display: none"></span>
                </i>
              </a>
              <a href="{{LaravelLocalization::localizeUrl('/user/cabinet')}}" class="header-user">
                <i class="header-user__icon"></i>
              </a>
              <a href="{{LaravelLocalization::localizeUrl('/cart')}}" class="basket-button">
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
                  <div class="subscribe-form__title">{{__('userpanel.subscribe_title')}}
                    <div class="subscribe-form__field">
                      <input class="subscribe-form__input" type="text" name="email" maxlength="255" autocomplete="off" placeholder="{{__('userpanel.subscribe_email_placeholder')}}" />
                    </div>
                    <div class="subscribe-form__button subscribe-form__button--mail subscribe-form__js-submit">
                      <span>{{__('userpanel.subscribe_button')}}</span>
                    </div>
                    <p class="subscribe-form__privacy">{{__('userpanel.subscribe_alert')}}<a href="/r/privacy_policy">{{__('userpanel.subscribe_link')}}</a>.</p>
                  </div>
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
                    <span class="footer-col-item__title"><i class="arrow-icon"></i>{{__('userpanel.customers')}}</span>
                    <ul class="footer-col-item__list footer-list">
                      @foreach($customer_articles as $c_article)
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl(route('user.article', [
                        'slug' => $c_article->slug,
                        ]))}}">
                          {{$c_article->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="footer-col__item footer-col-item" data-slug="about">
                    <span class="footer-col-item__title"><i class="arrow-icon"></i>{{__('userpanel.company')}}</span>
                    <ul class="footer-col-item__list footer-list">
                      @foreach($company_articles as $article)
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl(route('user.article', [
                        'slug' => $article->slug,
                        ]))}}">
                          {{$article->getLocalizeTitle(LaravelLocalization::getCurrentLocale())}}</a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                <div class="footer-col">
                  <div class="footer-col__item footer-col-item footer-col-item--connect">
                    <span class="footer-col-item__title"><i class="arrow-icon"></i></span>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--wa" target="_blank" href="https://api.whatsapp.com/send?phone=79126156257">
                          WhatsApp
                        </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--email" target="_blank" href="mailto:info@domnadereve.com">
                          {{__('userpanel.email')}} </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link footer-list-item__link-social footer-list-item__link--telegram" target="_blank" href="tg://resolve?domain=twelvestoreez_bot">
                          Telegram
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="footer-col__item footer-col-item">
                    <a href="/user/cabinet" class="footer-col-item__title"><i class="arrow-icon"></i>{{__('userpanel.lc')}}</a>
                    <ul class="footer-col-item__list footer-list">
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl('/user/cabinet')}}">
                          {{__('userpanel.lc_profile')}} </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl('/user/orders')}}">
                          {{__('userpanel.lc_orders')}} </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl('/user/subscribe')}}">
                          {{__('userpanel.lc_subscribtions')}} </a>
                      </li>
                      <li class="footer-list__item footer-list-item">
                        <a class="footer-list-item__link" href="{{LaravelLocalization::localizeUrl('/user/wishlist')}}">
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
                        <div class="subscribe-form__title">{{__('userpanel.subscribe_title')}}</div>
                        <div class="subscribe-form__field">
                          <input class="subscribe-form__input" type="text" name="email" maxlength="255" autocomplete="off" placeholder="{{__('userpanel.subscribe_email_placeholder')}}" />
                        </div>
                        <div class="subscribe-form__button subscribe-form__button--mail subscribe-form__js-submit">
                          <span>{{__('userpanel.subscribe_button')}}</span>
                        </div>
                        <p class="subscribe-form__privacy">{{__('userpanel.subscribe_alert')}}<a href="{{LaravelLocalization::localizeUrl('/r/privacy_policy')}}">{{__('userpanel.subscribe_link')}}</a>.</p>
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
                      <i class="reference-tools__icon reference-tools__icon_lang"></i>{{__('userpanel.english')}}</a>
                  </div>
                  @else
                  <div class="reference-tools__item"> <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}" class="reference-tools__link en-US">
                      <i class="reference-tools__icon reference-tools__icon_lang"></i>{{__('userpanel.russian')}}</a>
                  </div>
                  @endif
                </div>
              </div>
              <div class="footer-line-inn__center footer-socials">
                <h4 class="footer-socials__title">
                  {{__('userpanel.socials')}}
                </h4>
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