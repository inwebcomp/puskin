@if($name)
    <b>@lang('Имя'):</b> {{ $name }}<br>
@endif
@if($contact)
    <b>@lang('Контакт'):</b> {{ $contact }}<br>
@endif
@if($text)
    <b>@lang('Текст сообщения'):</b><br>
    {!! $text !!}
@endif