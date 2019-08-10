<!DOCTYPE html>
<html lang="{{ app('translator')->getLocale() }}">
<head>
    <meta charset="UTF-8">

    @include('layout.meta')

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
    <link rel="shortcut icon" href="/img/icons/favicon.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.0.3/css/froala_style.min.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">--}}
</head>
<body>
    <div id="app" class="{{ isset($pageType) ? 'page--' . $pageType : '' }}">
        <div class="sidebar__overlay" onclick="toggleMenu()"></div>

        <div class="container">
            @include('blocks.mobile-menu')
            @include('blocks.header')
            @include('blocks.breadcrumbs')

            @yield('header')

            <section class="page-content">
                @yield('content')
            </section>

            @yield('footer')

            @include('blocks.footer')
        </div>
    </div>

    <script>
        let translations = @php include_once(resource_path('lang/' . app('translator')->getLocale() . '.json')) @endphp;
    </script>

    @yield('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
