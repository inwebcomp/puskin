@if (count($activeFilters))
    <a href="{{ \App\Models\Article::pathAllNews() }}" class="archive-list__link more" style="margin-bottom: 32px">
        {{ __('Все новости') }}
        <i class="fal fa-long-arrow-right archive-list__icon"></i>
    </a>
@endif

<ul class="archive-list">
    <li class="archive-list__item">
        <h2 class="page-title archive-list__title">@lang('Рубрики')</h2>
    </li>

    @foreach($categories as $category)
        <li class="archive-list__item">
            <a href="{{ \App\Models\Article::pathAllNews(array_merge($activeFilters, ['category' => $category->slug])) }}"
               class="archive-list__link">
                {{ $category->title }}
                @if ($category->count)
                    <span class="archive-list__count">({{ $category->count }})</span>
                @endif
            </a>
        </li>
    @endforeach
</ul>