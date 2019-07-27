@extends('layout.default')

@section('content')
    <div class="classes">
        <h1 class="page-title-h1 classes__title">@lang('Классы')</h1>

        @foreach($classes as $group)
            <div class="classes__row">
                @foreach($group as $class)
                        @include('classes.snippets.card', ['class' => $class])
                @endforeach
            </div>
        @endforeach
    </div>
@endsection