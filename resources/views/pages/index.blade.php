@extends('layout.default')

@section('title', __('Лицей им. А.С.Пушкина'))

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.slider')

    @include('news.daily')

    <main class="page-main">
        @include('news.daily-big')

        @include('news.index')
    </main>

    @include('events.index')
@endsection

@section('scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection