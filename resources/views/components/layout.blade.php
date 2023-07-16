<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>arts-blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>
  <body class="antialiased font-courier">
    @include('layouts.navigation')
    {{ $slot }}
    @livewireScripts
  </body>
</html>