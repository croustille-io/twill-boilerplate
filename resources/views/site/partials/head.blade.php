<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}
  {!! JsonLd::generate() !!}

  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/favicons/site.webmanifest">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#a5d8c6">
  <link rel="shortcut icon" href="/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#a5d8c6">
  <meta name="msapplication-config" content="/favicons/browserconfig.xml">
  <meta name="theme-color" content="#a5d8c6">

  <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css', '/dist') }}" />

  <script>
      window.CROUSTILLE = window.CROUSTILLE || {};
  </script>

  @if(File::exists(public_path('/dist/js/head.js')))
      <script>{!! File::get(public_path('/dist/js/head.js')) !!}</script>
  @endif

  <script
      src="https://maps.googleapis.com/maps/api/js?key={{ config('map.google_maps_api_key') }}">
  </script>
</head>
