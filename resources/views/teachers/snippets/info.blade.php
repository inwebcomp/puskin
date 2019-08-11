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
        @if(count($teacher->currentLessons))
            <div class="teachers__item-info">
                <span class="teachers__item-key">@lang('Сейчас ведёт урок'):</span>
                @if(count($teacher->currentLessons) > 1)<br>@endif
                @foreach($teacher->currentLessons as $schedule)
                    <span class="classes__item-value">{{ $schedule->subject }} ({{ $schedule->classModel->title }})</span><br>
                @endforeach
            </div>
        @endif
    </div>

    @if($teacher->text)
        <div class="article__content">
            <div class="text-block fr-view">
                {!! $teacher->text !!}
            </div>
        </div>
    @endif

    @admin
        <div>
            <h2 class="page-title">
                @lang('Контакты')
            </h2>

            <div class="text-block fr-view">
                {!! $teacher->contacts !!}
            </div>
        </div>
    @endadmin
</article>

