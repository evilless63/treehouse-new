
@foreach($items as $item)

        @if($item->hasChildren())
        <div class="menu__item">
        <a href="{{route('user.category',$item->nickname) }}" class="menu__link js-sub-menu">
            <span class="menu__text">
            {{$item->title}} <i class="menu__sub-icon"></i>
            </span>
            <span class="menu__sub-icon-mobile"></span>
        </a>
        <ul class="menu__sub">
                @include('user.includes.header_categories', ['items'=>$item->children()])
        </ul>
        </div>
        @else
            <li class="menu__sub-item">
                <a href="{{route('user.category',$item->nickname) }}" @if($item->parent_id == 0) class="menu__link " @else class="menu__sub-link" @endif >
                    <span class="menu__text ">{{$item->title}}</span>
                </a>
            </li>
        @endif

@endforeach







