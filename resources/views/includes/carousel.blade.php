<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ url('/img/product01.png')}}" alt="Images">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>LA is always so much fun!</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ url('/img/product05.png')}}" alt="Imageso">
            <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ url('/img/product03.png')}}" alt="Imagesrk">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="fas fa-arrow-left" style="display:flex align-items:center"></i>
        <span class="sr-only" >Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <i class="fas fa-arrow-right"></i>
        <span class="sr-only">SIguiente</span>
    </a>
</div>