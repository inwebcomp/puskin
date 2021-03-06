<header class="header @if($pageType == 'index') header--shadow @endif">
    <button type="button" class="button-menu header__btn-menu" onclick="toggleMenu()">
        <i class="fas fa-bars button-menu__icon"></i>
        @lang('Меню')
    </button>

    @include('blocks.logo', ['classes' => 'header__logo'])

    <div class="header__right-box">
        <div class="header__info">
            <div class="header__contacts">
                <a href="{{ \InWeb\Base\Support\Route::route('contacts') }}" class="header__contact">
                    <i class="fas fa-map-marker-alt header__contact-icon"></i>
                    <span class="header__contact-text">{!! app('contacts')['address'] !!}</span>
                </a>
                <a href="tel:{{ app('contacts')['phone_link'] }}" class="header__contact">
                    <i class="fas fa-phone header__contact-icon"></i>
                    <span class="header__contact-text">{!! app('contacts')['phone'] !!}</span>
                </a>
            </div>

            @include('blocks.languages')
        </div>

        @include('blocks.menu')
    </div>
</header>