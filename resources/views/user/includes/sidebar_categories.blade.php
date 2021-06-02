
@foreach($items as $item)

            <p class="categories__item">
                <a class="categories__link" href="{{route('user.category',$item->nickname) }}">{{ $item->title }}</a>
            </p>

        @if($item->hasChildren())
                <div style="margin-left: 15px;" class="categories__item">
                @include('user.includes.sidebar_categories', ['items'=>$item->children()])
                </div>
        @endif

@endforeach





