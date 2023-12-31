<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'arts-blog') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-courier antialiased">
    <div class="min-h-screen">
      @include('layouts.navigation')
      <div class="">
        {{ $slot }}
      </div>
    </div>
  </body>
</html>
