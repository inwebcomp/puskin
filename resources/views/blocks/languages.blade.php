<nav class="languages header__lang">
    <a href="{{ url(\App\Route::pathForLanguage('ru', $meta)) }}" class="languages__item @if($locale == 'ru') active @endif">Русский</a>
    <a href="{{ url(\App\Route::pathForLanguage('ro', $meta)) }}" class="languages__item @if($locale == 'ro') active @endif">Romana</a>
</nav>