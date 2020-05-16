<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css', '/dist') }}" />
      <script>
          window.CROUSTILLE = window.CROUSTILLE || {};
      </script>
      @if(File::exists(public_path('/dist/js/head.js')))
          <script>
              {!! File::get(public_path('/dist/js/head.js')) !!}
          </script>
      @endif
    </head>
    <body>
      <div class="fixed inset-0 p-32 flex justify-center items-center">Bonjour</div>
      <script src="{{ mix('/js/manifest.js', '/dist') }}"></script>
      <script src="{{ mix('/js/vendor.js', '/dist') }}"></script>
      <script src="{{ mix('/js/app.js', '/dist') }}"></script>
    </body>
</html>
