<nav class="main-menu header__menu">
    @foreach($menu as $item)
        <div class="main-menu__item @if(isset($page) and $page->id == $item->page_id) active @endif">

            @if($item->link !== null)
                <a class="main-menu__link" href="{{ $item->link }}">{{ $item->title }}</a>
            @else
                <span class="main-menu__link">{{ $item->title }}</span>
            @endif

            @if ($item->children->count())
                <div class="drop-menu">
                    @foreach($item->children as $child)
                            <a class="drop-menu__item" href="{{ $child->link }}">{{ $child->title }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</nav>