<div class="page__sidebar page__sidebar_left media-query-show_wide">
    <h1 class="page__title">{{__('userpanel.my_lc_title')}}</h1>
    <div class="categories">
        <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/cabinet')}}" class="categories__link">{{__('userpanel.lc_profile')}}</a></div>
        <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/orders')}}" class="categories__link">{{__('userpanel.lc_orders')}}</a></div>
        <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/subscribe')}}" class="categories__link">{{__('userpanel.lc_subscribtions')}}</a></div>
        <div class="categories__item"><a href="{{LaravelLocalization::localizeUrl('/user/wishlist')}}" class="categories__link">Wishlist</a></div>
        <div class="categories__item">

            <form method="POST" action="{{LaravelLocalization::localizeUrl('/logout')}}">
                @csrf
                <a onclick="event.preventDefault();this.closest('form').submit();" class="categories__link">{{__('userpanel.logout')}}</a>
            </form>

        </div>
    </div>
</div>