@extends('layout.default')

@section('content')
    <main class="page-main">
        @include('teachers.snippets.info', ['teacher' => $teacher])
    </main>

    <aside class="page-sitebar">
        @include('teachers.classes', ['classes' => $teacher->classes])
    </aside>
@endsection