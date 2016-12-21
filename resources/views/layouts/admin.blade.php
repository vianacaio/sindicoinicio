<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body @if (!Auth::check()) class="city-bg" @endif>
    <div id="app">

        <aside id="sidebar">
            
            <!--
                trocar por uma logo mais clara
            -->
            <figure class="small-12 columns text-center">
                <img src="{{ asset('img/logo-big.png') }}" alt="" width="150">
            </figure>

            <nav id="panel-menu" class="small-12 float-left">
                <ul class="vertical menu" data-accordion-menu>
                    

                    <li>
                        <a href="/condominios"><i class="fa fa-building" aria-hidden="true"></i> Condominios</a>
                        <ul class="menu vertical nested">
                            <li><a href="#">Chamados</a></li>
                            <li><a href="#">Notificações</a></li>
                            <li><a href="/condominios">Listagem</a></li>
                            <li><a href="/condominios/create">Novo</a></li>

                        </ul>
                    </li>
                    
                    <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Meus dados</a>
                    <li><a href="#"><i class="fa fa-cube" aria-hidden="true"></i> Unidades</a>
                    <li><a href="#"><i class="fa fa-car" aria-hidden="true"></i> Vagas e veículos</a>
                    <li><a href="/pessoas"><i class="fa fa-address-card" aria-hidden="true"></i> Pessoas autorizadas</a>
                    <li><a href="{{ url('/logout') }}" class="link-logout"><i class="fa fa-times" aria-hidden="true"></i> Sair</a>
                </ul>

            </nav>
        </aside>

        <main id="admin-main" class="small-12 float-left">
            <div class="small-12 float-left topbar">
                <a href="#" class="fa fa-bars" data-open-menu></a>
            </div>
            @yield('content')
        </main>

    <a href="#" class="close-menu" data-open-menu></a>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('build/admin.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>

    <script>
        $(document).ready(function() {
            $('*[data-open-menu]').on('click',function(e) {
                e.preventDefault();
                $('#sidebar,.close-menu').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>