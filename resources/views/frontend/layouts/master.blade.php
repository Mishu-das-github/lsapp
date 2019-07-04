<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- This meta is used for avoiding 419 unknown status error --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    @yield('title','Laravel E-commerce site')
  </title>
  @include('frontend.partials.styles')
</head>

<body>
  <div class="wrapper">
    @include('frontend.partials.nav')
    @include('frontend.partials.message')
    @yield('content')
    @include('frontend.partials.footer')

  </div>
  @include('frontend.partials.scripts')
  @yield('scripts')
</body>

</html>