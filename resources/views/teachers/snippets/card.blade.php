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
    <span class="link-arrow pseudo teachers__link">
        @lang('Страница учителя')
    </span>
</a>