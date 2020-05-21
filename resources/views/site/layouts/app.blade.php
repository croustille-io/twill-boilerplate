<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('site.partials.head')

    <body>
        @include('site.partials.header')

        <div id="app">
            <main id="main">
                @yield('content')
            </main>
        </div>

        @include('site.partials.footer')

        {!! gtag() !!}

        <script src="{{ mix('/js/manifest.js', '/dist') }}"></script>
        <script src="{{ mix('/js/vendor.js', '/dist') }}"></script>
        <script src="{{ mix('/js/app.js', '/dist') }}"></script>
    </body>
</html>
