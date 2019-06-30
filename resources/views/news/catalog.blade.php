<div class="article-list">
    <h1 class="page-title-h1">{{ $title }}</h1>

    @foreach($news as $item)
        @include('news.snippets.big', ['item' => $item])
    @endforeach

    @include('blocks.pagination', ['pages' => $news])
</div>