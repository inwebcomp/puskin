<div class="article-list hidden-sitebar">
    <div class="article-list">
        <h2 class="page-title article-list__title">
            @lang('Новость дня')
            <i class="far fa-thumbtack page-title__icon-pin"></i>
        </h2>

        @include('news.snippets.big', ['item' => $item])
    </div>
</div>