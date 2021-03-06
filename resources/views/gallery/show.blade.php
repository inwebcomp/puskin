<main class="album">
    <a href="{{ \App\Models\Album::pathAll() }}" class="link-arrow pseudo left album__back">
        @lang('К фотоальбому')
    </a>

    <h2 class="page-title-h2 album__title">{{ $album->title }}</h2>

    <div class="data-comment album__date">
        <span class="data-comment__date">
            <i class="fal fa-calendar-alt data-comment__icon"></i>
            {{ $album->dateFormatted }}
        </span>
    </div>

    @if($album->text)
        <div class="article__content">
            <div class="text-block fr-view">
                {!! $album->text !!}
            </div>
        </div>
    @endif

    <div class="album__list">
        @foreach($images as $image)
            @include('gallery.snippets.image', ['image' => $image])
        @endforeach
    </div>
</main>