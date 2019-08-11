<a href="{{ $item->path() }}" class="album-prew">
    @if($item->image)
        <img src="{{ $item->image->getUrl('preview') }}" width="338" height="210" alt="{{ $item->title }}"
             class="album-prew__cover">
    @endif

    <h4 class="album-prew__title">{{ $item->title }}</h4>

    <div class="album-prew__bottom">
        <div class="data-comment album-prew__data">
            <span class="data-comment__date">
                <i class="fal fa-calendar-alt data-comment__icon"></i>
                {{ $item->dateFormatted }}
            </span>
        </div>
        <span class="link-arrow pseudo album-prew__link">
            @lang('Смотреть')
        </span>
    </div>
</a>