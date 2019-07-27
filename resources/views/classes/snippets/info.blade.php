<article class="article">
    <div class="article__head">
        <h1 class="page-title-h1">{{ $class->title }}</h1>

        @include('news.snippets.comments-info', ['item' => $class])
    </div>
    <div class="article__content">
        <div class="text-block">
            {!! $class->text !!}
        </div>
    </div>
</article>

