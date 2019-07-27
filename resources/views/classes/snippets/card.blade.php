<a href="{{ $class->path() }}" class="classes__item">
    <h3 class="classes__item-name">
        {{ $class->title     }}
        <span class="classes__item-count">15 учеников</span>
    </h3>
    <p class="classes__item-info">
        <span class="classes__item-key">Классный руководитель:</span>
        <span class="classes__item-value">Том Круз</span>
    </p>
    <p class="classes__item-info">
        <span class="classes__item-key">Сейчас идёт урок:</span>
        <span class="classes__item-value">Иностранный язык (10 каб.)</span>
    </p>
    <span class="link-arrow pseudo classes__link">
        @lang('Страница класса')
    </span>
</a>