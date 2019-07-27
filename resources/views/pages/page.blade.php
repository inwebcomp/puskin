@extends('layout.default')

@section('content')
    <main class="page-main">
        @include('news.snippets.content', ['item' => $page])
    </main>

    @include('events.index')
@endsection

@section('footer')
    @include('news.other')
@endsection