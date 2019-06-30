<article class="news news--separator">
    @if($item->image)
        <a href="{{ $item->path() }}" class="news__photo">
            <img src="{{ $item->image->getUrl('card') }}" width="257" height="160" alt="{{ $item->title }}" class="news__photo-img">
        </a>
    @endif

    @include('news.snippets.comments-info', ['classes' => 'data-comment--lg'])

    <h3 class="news__title">
        <a class="news__title-link" href="{{ $item->path() }}">{{ $item->title }}</a>
    </h3>
</article>