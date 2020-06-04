<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav text-center">
            <li class="active"><a href="{{ url('inicio')}}">Inicio</a></li>
                <li><a href="{{url('nosotros') }}">Nosotros</a></li>
                <li><a href="{{url('noticias') }}">Noticias</a></li>
                <li><a href="{{url('oportunidades') }}">Oportunidades</a></li>
            <li><a href="{{url('contacto') }}">Contacto</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Categorias</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('categories.show',1)  }}">Herramientas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('categories.show',2)  }}">Herramientas Electricas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('categories.show',3)  }}">Abrasivos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('categories.show',4)  }}">Pinturas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('categories.show',5)  }}">Insumos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('categories.show',6)  }}">Adhesivos</a>
                    </div>
                </div>
            </li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
