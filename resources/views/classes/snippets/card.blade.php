<a href="{{ $class->path() }}" class="classes__item @isset($full) classes__item--full @endisset">
    <h3 class="classes__item-name">
        {{ $class->title     }}
        <span class="classes__item-count">15 учеников</span>
    </h3>
    @isset($class->teacher)
        <p class="classes__item-info">
            <span class="classes__item-key">@lang('Классный руководитель'):</span>
            <span class="classes__item-value">{{ $class->teacher->name }}</span>
        </p>
    @endisset
    @isset($class->currentLesson)
        <p class="classes__item-info">
            <span class="classes__item-key">@lang('Сейчас идёт урок'):</span>
            <span class="classes__item-value">{{ $class->currentLesson->subject }}</span>
        </p>
    @endisset
    <span class="link-arrow pseudo classes__link">
        @lang('Страница класса')
    </span>
</a>