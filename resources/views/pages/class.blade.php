@extends('layout.default')

@section('content')
    <main class="page-main">
        @include('classes.snippets.info', ['class' => $class])
        @include('classes.schedule', ['schedule' => $class->preparedSchedule])
    </main>

    <aside class="page-sitebar">
        @include('classes.teacher', ['teacher' => $class->teacher, 'full' => true])
    </aside>
@endsection