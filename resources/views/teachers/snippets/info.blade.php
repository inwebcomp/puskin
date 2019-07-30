<article class="article">
    <div class="article__head clearfix">
        @isset($teacher->image)
            <div class="teachers__item__photo">
                <img class="teachers__item__img" width="120" height="160" src="{{ $teacher->image->getUrl('small') }}" alt="{{ $teacher->name }}">
            </div>
        @endisset

        <h1 class="page-title-h1">{{ $teacher->name }}</h1>

        <div class="teachers__item__info">
            {!! $teacher->subjects !!}
        </div>
    </div>

    <div class="article__content">
        <div class="text-block">
            {!! $teacher->text !!}
        </div>
    </div>
</article>

