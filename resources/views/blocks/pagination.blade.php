@if($pages->lastPage() > 1)
    <nav class="pagination">
        @if(! $pages->onFirstPage())
            <a href="{{ $pages->previousPageUrl() }}" class="pagination__item first">@lang('Предыдущая')</a>
        @endif

        <a href="{{ $pages->url(1) }}" class="pagination__item @if($pages->currentPage() == 1) active @endif">1</a>

        @php
            $rangeStart = max($pages->currentPage() - 2, 2);
            $rangeEnd = min($pages->currentPage() + 2, $pages->lastPage() - 1);
        @endphp

        @if($rangeEnd > $rangeStart)
            @foreach($pages->getUrlRange($rangeStart, $rangeEnd) as $page => $link)
                <a href="{{ $link }}" class="pagination__item @if($pages->currentPage() == $page) active @endif">{{ $page }}</a>
            @endforeach
        @endif

        <a href="{{ $pages->url($pages->lastPage()) }}" class="pagination__item @if($pages->currentPage() == $pages->lastPage()) active @endif">{{ $pages->lastPage() }}</a>

        @if($pages->hasMorePages())
            <a href="{{ $pages->nextPageUrl() }}" class="pagination__item last">@lang('Следующая')</a>
        @endif
    </nav>
@endif