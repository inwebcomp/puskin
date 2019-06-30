@extends('layout.default')

@section('title', __('Лицей им. А.С.Пушкина'))

@section('content')
    <main class="page-main">
        @include('news.catalog')
    </main>

    <aside class="page-sitebar">
        @include('filters.archive', ['archive' => $archive])
    </aside>
@endsection