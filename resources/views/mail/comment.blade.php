@lang("Комментарий к записи"):
<a href="{{ $article->path() }}">{{ $article->title }}</a>

@if($name)
    <b>@lang('Имя'):</b> {{ $name }}<br>
@endif
@if($text)
    <b>@lang('Текст комментария'):</b><br>
    {!! $text !!}
@endif