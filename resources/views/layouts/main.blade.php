<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title")</title>

    {{-- font roboto --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    {{-- css app --}}
    <link rel="stylesheet" href="/css/styles.css">

    {{-- js --}}
    <script src="/js/app.js"></script>

    {{-- JQuery --}}
    <script src="/js/jquery-3.6.0.js"></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container align-middle">
                <a class="navbar-brand" href="/">
                    <h1>Telzir</h1>
                </a>
                <div class="meunuEspecifico">
                    <input type="checkbox" id="menu-hamburguer">
                    <label class="menuEsp" for="menu-hamburguer">
                        <div class="navbar-toogle" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburguer"></span>
                        </div>
                    </label>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/chamadas" class="nav-link">Calcular Chamada</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard_plans" class="nav-link">Editar Planos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard_tariffs" class="nav-link">Editar Tarifas</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                    this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </header>
<div class="w-100 h-100">
        @yield("content")
</div>


    <footer>
        <p>Jackson Abrão &copy; 2022</p>
    </footer>


    {{-- icons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- Script Navbar--}}
    <script>
        $(function() {
            $(window).on("scroll", function() {
                if ($(window).scrollTop() > 80) {
                    $(".navbar").addClass("navbar2");
                } else {
                    $(".navbar").removeClass("navbar2")
                }
            })
        })

    </script>

</body>

</html>

