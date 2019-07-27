@extends('layout.default')

@section('content')
    <main class="page-main">
        @include('classes.snippets.info', ['class' => $class])
    </main>
@endsection