<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arts-Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="antialiased font-courier">
    @include('layouts.navbar')
    {{ $slot }}
  </body>
</html>