<a href="{{ $class->path() }}" class="classes__item classes__item--full">
    <h3 class="classes__item-name">
        {{ $class->title }}
        <span class="classes__item-count">15 учеников</span>
    </h3>
    @isset($class->currentLesson)
        <p class="classes__item-info">
            <span class="classes__item-key">@lanmg('Сейчас идёт урок'):</span>
            <span class="classes__item-value">{{ $class->currentLesson }}</span>
        </p>
    @endisset
    <span class="link-arrow pseudo classes__link">
        @lang('Страница класса')
    </span>
</a>