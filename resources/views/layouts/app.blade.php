<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="h-100">
    <div id="app" class="d-flex flex-row h-100">
        <nav class="navbar bg-dark navbar-dark flex-column">
            <ul class="navbar-nav flex-column">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                @foreach([
                    'Shows' => ['root' => 'shows'],
                    'Training' => ['root' => 'training'],
                    'Roles' => ['root' => 'roles' ],
                ] as $header => $data)
                <li class="nav-item">
                    <a href="{{ route($data['route'] ?? $data['root'] . '.index') }}"
                       class="nav-link {{ strpos(Route::currentRouteName(), $data['root']) === 0 ? 'active' : '' }}">
                        {{ $header }}
                    </a>
                </li>
                @endforeach
                @endguest
            </ul>
        </nav>

        <main style="overflow-y: scroll" class="w-100">
            <header class="header p-4 bg-dark text-light">@yield('header', config('app.name', 'Laravel'))</header>
            <div class="py-4">
                @yield('content')
            </div>
        </main>
    </div>
</body>
<script type="text/javascript">
    @yield('javascripts')
</script>

</html>
