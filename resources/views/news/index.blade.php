<div class="article-list">
    <h2 class="page-title page-title--labeled article-list__title">
        @lang('Последние новости')
        <a class="button button--small page-title__btn" href="{{ \InWeb\Base\Support\Route::route('news.index') }}">@lang('Все новости')</a>
    </h2>

    @foreach($news as $item)
        @include('news.snippets.big', ['item' => $item])
    @endforeach

    <a href="{{ \InWeb\Base\Support\Route::route('news.index') }}" class="button button--small article-list__btn">@lang('Все новости')</a>
</div>