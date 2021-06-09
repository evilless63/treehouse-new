<div class="catalog-list catalog-list_wrap catalog__list">
    <div id="catalog-models" data-pjax-container="" data-pjax-push-state
        data-pjax-timeout="10000">
        <div id="catalog-list" class="catalog-list__holder list-view">
            <div class="catalog-list__row">
                @foreach ($products_by_category as $product_by_category)
                    <div class="catalog-list__item" data-sizes='[]'>
                        <a href="{{ route('user.product', [
'product' => $product_by_category->product->slug,
'color' => $product_by_category->color->slug,
]) }}"
                            class="catalog-list__link" data-pjax="0">
                            <div class="catalog-list__preview">
                                <span class="catalog-list__fav js-add-fav" @if ($wishlist->where('id', $product_by_category->id)->count() > 0) style="display:none" @endif
                                    color-variation-id="{{ $product_by_category->id }}"></span>
                                <span class="catalog-list__fav catalog-list__fav__in js-rem-fav"
                                    @if ($wishlist->where('id', $product_by_category->id)->count() == 0) style="display:none" @endif
                                    color-variation-id="{{ $product_by_category->id }}"></span>
                                <img src="{{ asset($product_by_category->main_img()) }}"
                                    alt="{{ $product_by_category->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                    class="catalog-list__image" />
                            </div>
                        </a>
                        <div class="catalog-list__box">
                            <a id="104410"
                                href="{{ route('user.product', [
'product' => $product_by_category->product->slug,
'color' => $product_by_category->color->slug,
]) }}"
                                class="catalog-list__link" data-pjax="0">

                                <div class="catalog-list__box">

                                    <div class="catalog-list__info catalog-list__info_head">





                                    </div>

                                </div>

                                <!-- Заголовок товара -->
                                <div class="catalog-list__title">
                                    <div class="catalog-list__title-inn">
                                        <span>{{ $product_by_category->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                            @if($product_by_category->color->id !== 76){{ $product_by_category->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}@endif</span>
                                    </div>
                                </div>
                                <!-- Заголовок товара END -->

                                <!-- Цена и скидка товара -->
                                <div class="catalog-list__price">
                                    <span class="">
                                        @if ($product_by_category->sizeVariations->sortBy('price')->first()->price == $product_by_category->sizeVariations->sortByDesc('price')->first()->price)
                                            {{ $product_by_category->sizeVariations->sortBy('price')->first()->price }}
                                        @else
                                            {{ $product_by_category->sizeVariations->sortBy('price')->first()->price }}
                                            -
                                            {{ $product_by_category->sizeVariations->sortByDesc('price')->first()->price }}
                                        @endif
                                        {{ __('userpanel.currency') }}
                                    </span>
                                </div>
                                <!-- Цена и скидка товара END -->
                            </a>

                            <!-- Цвета -->
                            <ul class="catalog-list__colors catalog-list-colors">
                                @foreach ($product_by_category->product->colorVariations as $colorVariation)
                                    <li class="catalog-list-colors__color "
                                        title="{{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}"
                                        style="background:{{ $colorVariation->color->hex }}">
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Цвета END -->

                            <!-- Размеры в наличии  -->
                            {{-- <ul class="catalog-list-sizes" data-one-size="">
                                @foreach ($colorVariation->sizeVariations as $sizeVariation)
                                    <li class="catalog-list-sizes__item">
                                        {{ $sizeVariation->size->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                    </li>
                                @endforeach
                            </ul> --}}
                            <!-- Размеры в наличии END  -->
                        </div>
                    </div>
                @endforeach
                <div class="pagination-wrap"></div>
            </div>
        </div>
    </div>
</div>