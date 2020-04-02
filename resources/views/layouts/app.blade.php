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
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                        @endif
                        @else
                        @if(!auth()->user()->admin)
                        <a class="dropdown-item"
                            href="{{url('/perfil')}}">{{ Auth::user()->name}}{{Auth::user()->lastname }}</a>
                        @else
                        <a class="dropdown-item" href="{{url('/admin/dashboard')}}">{{ Auth::user()->name }}
                            {{ Auth::user()->lastname  }}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
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

</body>

</html>
