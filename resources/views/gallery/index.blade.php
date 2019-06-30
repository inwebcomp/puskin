<main class="gallery">
    <h2 class="page-title-h2 gallery__title">@lang('Фотоальбом')</h2>

    <div class="gallery__list">
        @foreach($albums as $album)
            @include('gallery.snippets.album', ['item' => $album])
        @endforeach
    </div>
</main>