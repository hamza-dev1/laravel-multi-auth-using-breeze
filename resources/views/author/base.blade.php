<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('author-assets/img/favicon.ico') }}" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{ asset('author-assets/img/apple-icon.png') }}"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Dashboard</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>

    @yield('content')

    @yield('script')
  </body>
</html>
