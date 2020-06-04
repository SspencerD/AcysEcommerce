<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($slides as $slider)
        <div class="item @if($loop->first) active @endif">
            
            <img src="{{$slider->featured_image_url }}" alt="Images">
            <div class="carousel-caption">
                <h3>{{ $slider->name }}</h3>
                <p>{{ $slider->description }}</p>
            </div>
           
        </div>
         @endforeach
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