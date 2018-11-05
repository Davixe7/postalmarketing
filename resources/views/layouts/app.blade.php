<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito|Material+Icons|Roboto:300,400,500" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Cadetes</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('cadetes.index') }}">Ver todos</a></li>
                <li><a href="{{ route('cadetes.create') }}">Registrar nuevo</a></li>
                <li><a href="{{ route('cadetes.upload') }}">Cargar XLS</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Clientes</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('clients.index') }}">Ver todos</a></li>
                <li><a href="{{ route('clients.create') }}">Registrar nuevo</a></li>
                <li><a href="{{ route('clients.upload') }}">Cargar XLS</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Productos</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('products.index') }}">Ver todos</a></li>
                <li><a href="{{ route('products.create') }}">Registrar nuevo</a></li>
                <li><a href="{{ route('products.upload') }}">Cargar XLS</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li><a href="#!">Administradores</a></li>
      <li><a href="#!">Configuración</a></li>
    </ul>
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img src="{{ asset('img/logo.png') }}" style="width: 120px; filter: grayscale(100%);" alt=""></a>
            <ul class="right hide-on-med-and-down">
              @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                @if( Route::has('Register') )
                  <li><a href="badges.html">Register</a></li>
                @endif
              @else
              @endguest
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
        </nav>
      </div>
    </header>
    <main>
      @yield('content')
    </main>
  </div>
</body>
</html>
