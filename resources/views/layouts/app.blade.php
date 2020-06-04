<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',config('app.name'))</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ url('images/logo.png') }}" sizes="32x32">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    @yield('styles')
    <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999
        }

        .tt-menu {
            /* used to be tt-dropdown-menu in older versions */
            width: 210px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }

        .tt-suggestion.tt-cursor,
        .tt-suggestion:hover {
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">

            <div class="container">
                <div class="dropdown header-links pull-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi cuenta
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @guest
                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Ingresar') }}</a></li>
                        @if (Route::has('register'))
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                        <div class="dropdown-divider"></div>
                        @endif
                        @endguest

                        @if(Auth::check())
                        @forelse(Auth::user()->roles as $role)

                        @if($role->name =='Supervisor'|| 'Admin')
                        <a class="dropdown-item" href="{{url('/dashboard')}}">{{ Auth::user()->name }}
                            {{ Auth::user()->lastname  }}</a>
                        <div class="dropdown-divider"></div>
                        @endif
                        @empty
                        <a class="dropdown-item" href="{{url('/perfil')}}">{{ Auth::user()->name }}
                            {{ Auth::user()->lastname  }}</a>
                        <div class="dropdown-divider"></div>

                        @endforelse
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf

                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{ url('/images/logo.png') }}" height="150" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    @include('includes.buscador')
                    <!-- /SEARCH BAR -->
                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            @if(Auth::check())
                            @include('includes.shoppingcart')
                            @else
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Tu Carrito</span>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <p>Debes iniciar sesión para utilizar tu carrito.</p>
                                    </div>
                                    <div class="cart-btns">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    </div>
    <!-- /HEADER -->
    @yield('content')
    @include('includes.footer')
    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/fd40c217d2.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function (){

   var products = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '{{ url("/products/json") }}'
});

$('#buscar').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'products',
  source: products
    });
});

    </script>

    <script>
        function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.','');
        // Despejar Guión
        valor = valor.replace('-','');

        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();

        // Formatear RUN
        rut.value = cuerpo + '-'+ dv

        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;

        // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

    }
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

    </script>

</body>

</html>
