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
        <title>@yield('title',config('app.name',))</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-right">
                        @guest
                      <li><a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a></li>
                      @if (Route::has('register'))
                      <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                      @endif
                      @else
                      @if(!auth()->user()->admin)
                    <li><a class="nav-link" href="{{url('/perfil')}}">{{ Auth::user()->name}}{{Auth::user()->lastname }}</a>
                       @else
                    <li><a class="nav-link" href="{{url('/admin/dashboard')}}">{{ Auth::user()->name }} {{ Auth::user()->lastname  }}</a>
                        @endif
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                      </li>
                      @endguest
					</ul>
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
									<img src="{{ url('/images/logo.png') }}" height="100" alt="">
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


    </body>
</html>

