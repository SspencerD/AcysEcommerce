@extends('layouts.app')


@section('title','Contacto' .config('app.name'))


@section('content')
@include('includes.menu')
<div class="section">
    <!-- container -->
    <br><br><br>
    <div class="container">
        <h2>Quienes somos</h2>
        <div class="jumbotron">
            <img src="{{asset('/images/nosotros2.jpg') }}" alt="" width="1000">
        </div>

        <div class="row marketing">
            <div class="col-lg-12">
                <div class="jumbotron animated slideInLeft">
                    <div class="container">
                        <h3>ACYS Ltda somos una empresa con más de 10 años de experiencia, consolidados como una empresa
                            pujante y con la mentalidad
                            de seguir creciendo en Servicios, Soporte y Ventas computacionales Entregando a nuestros
                            clientes soluciones para sus
                            requerimientos de Hardware y Software, implementación de redes, cableado estructurado,
                            servicio técnico, contratos de
                            mantención y todo lo relacionado a proporcionar soluciones tecnológicas.
                            Con la visión de Servicios nuestra empresa se ha ampliado en las áreas de Climatización,
                            proyectos Eléctricos además de
                            Servicios Generales (Mantención de Oficinas en todos los requerimientos que en ello
                            implica).</h3>
                    </div>
                </div>
            </div>
        </div>
       <div class="jumbotron animated slideInLeft">
        <h2>Nuestra Visión</h2>
        <div class="container">
            <p>Constituirnos en el Principal Aliado Computacional y de todos los servicios que hoy ofrecemos para cada uno de Nuestro
            Clientes y constituirnos en un Socio Integral principalmente para Empresas que no cuenten con Áreas Tecnológicas y de
            Informática, teniéndonos como un socio estratégico y confiable, con soluciones concretas, rápidas y efectivas para sus
            necesidades diarias.</p>
        </div>
    </div>
        <div class="jumbotron animated slideInLeft">
            <h2>Nuestra Misión</h2>
            <div class="container">
                <p>Ser un Socio que haga de las necesidades empresariales, soluciones que contribuyan con herramientas e
                    ideas al
                    desarrollo y seguridad aplicado a las necesidades especificas de cada empresa o persona
                    ofreciéndoles soluciones
                    integrales para crear o desarrollar soluciones tecnológicas que permitan facilitar a nuestro Cliente
                    el tiempo y el
                    espacio necesario donde le permita solo abocarse a su Negocio y poder ser un líder ante sus
                    competidores en el Mercado,
                    nuestro objetivo es día a día estar atento a cada nueva necesidad que nazca se genere al interior de
                    la organización.</p>
            </div>
        </div>

        <div class="jumbotron animated slideInLeft">
            <h2>¿Cual es nuestro objetivo?</h2>
            <div class="container">
                <p>Que nuestro Cliente se dedique a su negocio y nosotros ser el Socio Tecnológico y contraparte Técnica
                    donde nos ponemos
                    de su lado para buscar las mejores soluciones económicas y Tecnológicas del Mercado para luego
                    implementarlas y
                    mantenerlas sin que él Cliente se preocupe de su desarrollo, puesta en marcha y ejecución donde el
                    resultado final sea
                    una herramienta que aporte al crecimiento consolidación la Organización.</p>
            </div>
        </div>
    </div>
</div>

@endsection