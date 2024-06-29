<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jean Moedas</title>

    <link rel="shortcut icon" href="{{asset('assets/img/faviconJM.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <div class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('assets/img/logoJM.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="#">
                    Jean Moedas
                </a>
            </div>



            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>

    <main class="py-4">
        <section>
            <div class="container-fluid d-flex flex-direction-row py-5">
                <img class="img-fluid" src="{{asset('assets/img/welimg.jpeg')}}" alt="" id="welImg">
                <aside class="px-5 w-50" id="welText">
                    <h3>A Plataforma de Investimentos Mais Inovadora do Mundo!!</h3>
                    <p>Imagine um lugar onde você pode investir em uma variedade de ativos, desde ações e títulos até criptomoedas e commodities, tudo em um único local. Imagine um ambiente seguro, transparente e fácil de usar, onde você pode monitorar e gerenciar seus investimentos em tempo real. Imagine uma equipe de especialistas em investimentos que trabalham arduamente para garantir que seus investimentos sejam o mais rentáveis possíveis.</p>

                    @guest
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-primary">Acesse o Dashboard</a>
                    @endif
                    @else
                    <a href="{{ route('home') }}" class="btn btn-primary">Acesse o Dashboard</a>
                    @endguest
                </aside>
            </div>
        </section>
    </main>
</body>

</html>
