<article class="article">
    <div class="article__head">
        <h1 class="page-title-h1">{{ $item->title }}</h1>

        @include('news.snippets.comments-info', ['item' => $item])
    </div>
    <div class="article__content">
        <div class="text-block fr-view">
            @if($item->image)
                <img src="{{ $item->image->getUrl() }}" alt="{{ $item->title }}">
            @endif

            {!! $item->text !!}
        </div>
    </div>

    @if($item->comments)
        <div class="article__comments">
            @include('news.snippets.comments', ['comments' => $item->comments])
        </div>
    @endif
</article>

