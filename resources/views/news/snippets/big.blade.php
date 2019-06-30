<article class="article-prew">
    @if($item->image)
        <a href="{{ $item->path() }}" class="article-prew__photo">
            <img src="{{ $item->image->getUrl('big') }}" width="320" height="196" alt="{{ $item->title }}" class="article-prew__photo-img">
        </a>
    @endif

    <div class="article-prew__content @if (! $item->image) article-prew__content--full @endif">
        <h3 class="article-prew__title">
            <a href="{{ $item->path() }}">{{ $item->title }}</a>
        </h3>

        @include('news.snippets.comments-info')

        <p class="article-prew__text">{{ $item->description }}</p>

        <a href="{{ $item->path() }}" class="link-arrow pseudo article-prew__link">@lang('Подробнее')</a>
    </div>
</article>