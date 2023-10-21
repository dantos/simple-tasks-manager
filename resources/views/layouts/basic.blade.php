<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}}</title>
  <!-- Styles -->
  @vite(['resources/css/app.css'])
  @stack('styles')
</head>
<body>

  @yield('content')

  @vite(['resources/js/app.js'])
  @stack('scripts')
</body>
</html>
