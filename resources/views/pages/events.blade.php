@extends('layout.default')

@section('content')
    <main class="page-main">
        @include('news.catalog', ['news' => $events])
    </main>

    <aside class="page-sitebar">
        @include('filters.categories', ['categories' => $categories])
        @include('filters.archive', ['archive' => $archive])
    </aside>
@endsection