<aside class="page-sitebar news-sitebar">
    <div class="news-list">
        <h2 class="page-title news-list__title">
            @lang('Новость дня')
            <i class="far fa-thumbtack page-title__icon-pin"></i>
        </h2>

        @if($item)
            @include('news.snippets.card', ['item' => $item])
        @endif
    </div>
</aside>