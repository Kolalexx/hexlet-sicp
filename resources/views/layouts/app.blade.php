<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@yield('description', __('layout.meta.description'))">
  @hasSection ('meta-robots')
  <meta name="robots" content="@yield('meta-robots')">
  @endif

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="csrf-param" content="_token" />

  <title>@yield('title', __('layout.title.name'))</title>
  @includeWhen(app()->environment('production'), 'layouts.deps._gtm_head')

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <!-- Styles -->
  @stack('styles')
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
  @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
</head>

<body class="min-vh-100 d-flex flex-column">
  @include('layouts._nav')
  @include('flash::message')
  @hasSection('content')
  <main class='flex-grow-1 m-0'>
    <div class="container p-0">
      @yield('content')
    </div>
  </main>
  @endif

  @hasSection('landing_content')
  <main>
    @yield('landing_content')
  </main>
  @endif

  @include('layouts._footer')
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="{{ mix('js/hljs.js')}}"></script>
  <script src="{{ mix('js/custom.js')}}" defer></script>
  @stack('scripts')
</body>

</html>
