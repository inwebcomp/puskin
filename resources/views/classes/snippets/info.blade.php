<article class="article">
    <div class="article__head">
        <h1 class="page-title-h1">{{ $class->title }}</h1>
    </div>
    @if($class->text)
        <div class="article__content">
            <div class="text-block fr-view">
                {!! $class->text !!}
            </div>
        </div>
    @endif
</article>

