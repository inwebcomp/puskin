<footer class="footer">
    <div class="footer__main">
        @include('blocks.logo', ['classes' => 'logo--invers footer__logo'])

        <nav class="footer__content">
            @foreach($menu as $item)
                <div class="footer__list">
                    <li class="footer__list-item head">
                        @if($item->link !== null)
                            <a class="footer__list-link" href="{{ $item->link }}">{{ $item->title }}</a>
                        @else
                            <span class="footer__list-link">{{ $item->title }}</span>
                        @endif
                    </li>

                    @foreach($item->children as $child)
                        <li class="footer__list-item">
                            <a class="footer__list-link" href="{{ $child->link }}">{{ $child->title }}</a>
                        </li>
                    @endforeach
                </div>
            @endforeach

            <ul class="footer__list">
                <li class="footer__list-item head">
                    <a href="{{ \InWeb\Base\Support\Route::route('contacts') }}" class="footer__list-link">@lang('Контакты')</a>
                </li>
                <li class="footer__list-item">
                    <a href="mailto:{{ app('contacts')['email'] }}" class="footer__list-link">{!! app('contacts')['email'] !!}</a>
                </li>
                <li class="footer__list-item">
                    <a href="tel:{{ app('contacts')['phone_link'] }}" class="footer__list-link">{!! app('contacts')['phone'] !!}</a>
                </li>
                <li class="footer__list-item">
                    <a href="{{ \InWeb\Base\Support\Route::route('contacts') }}" class="footer__list-link">{!! app('contacts')['address'] !!}</a>
                </li>
            </ul>
        </nav>
    </div>
    
    <div class="footer__bottom">
        <div class="footer__copyr">{!! \App\Models\Textblock::html('copyrights') !!}</div>
        <p class="footer__author">Сайт разработан командой
            <a class="footer__author-link" href="//inweb.md" target="_blank">InWeb.md</a>
        </p>
    </div>
</footer>