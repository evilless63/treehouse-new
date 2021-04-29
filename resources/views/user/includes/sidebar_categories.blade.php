
@foreach($items as $item)

            <p class="categories__item">
                <a @if($item->hasChildren() || $item->parent_id == 0) style="font-size: 16px;" @endif class="categories__link" href="{{route('user.category',$item->id) }}">{{ $item->title }}</a>
            </p>

        @if($item->hasChildren())
                <div style="margin-left: 15px;" class="categories__item">
                @include('user.includes.sidebar_categories', ['items'=>$item->children()])
                </div>
        @endif

@endforeach





