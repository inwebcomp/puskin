<a href="{{ $teacher->path() }}" class="teachers__item @isset($full) teachers__item--full @endisset">
    @isset($teacher->image)
        <div class="teachers__item__photo">
            <img class="teachers__item__img" width="120" height="160" src="{{ $teacher->image->getUrl('small') }}" alt="{{ $teacher->name }}">
        </div>
    @endisset
    <h3 class="teachers__item__name">
        {{ $teacher->name }}
    </h3>
    <div class="teachers__item__info">
        {!! $teacher->subjects !!}
    </div>
    @if(count($teacher->currentLessons))
        <div class="teachers__item-info">
            <span class="teachers__item-key">@lang('Сейчас ведёт урок'):</span>
            @if(count($teacher->currentLessons) > 1)<br>@endif
            @foreach($teacher->currentLessons as $schedule)
                <span class="classes__item-value">{{ $schedule->subject }} ({{ $schedule->classModel->title }})</span><br>
            @endforeach
        </div>
    @endif
    <span class="link-arrow pseudo teachers__link">
        @lang('Страница учителя')
    </span>
</a>