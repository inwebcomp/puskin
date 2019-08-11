<div class="sidebar sidebar--menu">
    <section class="mobl-menu sidebar__content">
        <button class="mobl-menu__close-btn" onclick="toggleMenu()">
            <i class="fal fa-times mobl-menu__close-btn__icon"></i>
        </button>

        @include('blocks.logo', ['classes' => 'mobl-menu__logo'])

        <ul class="mobl-menu__list">
            @foreach($menu as $item)
                <li class="mobl-menu__item @if(isset($page) and $page->id == $item->page_id) active @endif">
                    @if($item->link !== null)
                        <a class="mobl-menu__link" href="{{ $item->link }}">{{ $item->title }}</a>
                    @else
                        <span class="mobl-menu__link">{{ $item->title }}</span>
                    @endif

                    @if ($item->children->count())
                        <div class="arrow" onclick="toggleMenuItem(event)"></div>
                    @endif

                    @if ($item->children->count())
                        <div class="mobl-menu__drop-menu">
                            @foreach($item->children as $child)
                                <a class="mobl-menu__drop-menu__link" href="{{ $child->link }}">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="mobl-menu__contacts">
            <a href="{{ \InWeb\Base\Support\Route::route('contacts') }}" class="header__contact">
                <i class="fas fa-map-marker-alt header__contact-icon"></i>
                <span class="header__contact-text">{!! app('contacts')['address'] !!}</span>
            </a>
            <a href="tel:{{ app('contacts')['phone_link'] }}" class="header__contact">
                <i class="fas fa-phone header__contact-icon"></i>
                <span class="header__contact-text">{!! app('contacts')['phone'] !!}</span>
            </a>
        </div>
    </section>
</div>