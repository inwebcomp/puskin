<ul class="archive-list">
    <li class="archive-list__item">
        <h2 class="page-title archive-list__title">@lang('Архив')</h2>
    </li>

    @foreach($archive as $year => $items)
        <li class="archive-list__item">
            <a href="{{ \InWeb\Base\Support\Route::route('news.index', ['date' => $year]) }}" class="archive-list__link more">
                {{ $year . ' ' . __('год') }}
                <i class="fal fa-long-arrow-right archive-list__icon"></i>
            </a>
        </li>

        @foreach($items as $item)
            <li class="archive-list__item" data-year="{{ $year }}">
                <a href="{{ \InWeb\Base\Support\Route::route('news.index', ['date' => $item['query']]) }}" class="archive-list__link">
                    {{ $item['title'] }}
                    @if ($item['count'])
                        <span class="archive-list__count">({{ $item['count'] }})</span>
                    @endif
                </a>
            </li>
        @endforeach
    @endforeach
</ul>