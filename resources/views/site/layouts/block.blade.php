<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css', '/dist') }}" />
    </head>
    <body>
        <div id="app">
          @yield('content')
        </div>
        <script src="{{ mix('/js/manifest.js', '/dist') }}"></script>
        <script src="{{ mix('/js/vendor.js', '/dist') }}"></script>
        <script src="{{ mix('/js/app.js', '/dist') }}"></script>
    </body>
</html>
