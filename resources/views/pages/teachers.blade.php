@extends('layout.default')

@section('content')
    <div class="teachers">
        <h1 class="page-title-h1 teachers__title">@lang('Учителя')</h1>

        @foreach($teachers as $group)
            <div class="classes__row">
                @foreach($group as $teacher)
                        @include('teachers.snippets.card', ['teacher' => $teacher])
                @endforeach
            </div>
        @endforeach
    </div>
@endsection