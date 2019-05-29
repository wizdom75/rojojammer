@if($banners)

<div id="carouselIndicators" class="carousel slide " data-ride="carousel">
    <div class="overlay"></div>
    <ol class="carousel-indicators">
      
      @for($i = 0; $i < count($banners); $i++)
        <li data-target="#carouselIndicators" data-slide-to="{{$i}}" class=" {{($i == 0)?'active':'' }}"></li>
      @endfor
    </ol>
    <div class="carousel-inner">
        <?php $i=0; ?>
        @foreach($banners as $banner)
        
          <div class="carousel-item {{ ($i == 0)?'active':'' }}">
            
              <img class="d-block w-100" src="{{asset($banner->path)}}" alt="{{ $banner->title }}">
            
            <div class="hero carousel-caption d-none d-block">
                <h1 class="text-uppercase font-weight-bold d-none d-block">{{ $banner->title }}</h1>
                <p class="d-none d-block">{{ $banner->blurb }}</p>
                <a class="d-none d-md-block" href="{{ $banner->link }}">
                  <button class="btn btn-outline-success btn-lg rounded-0 font-weight-bold" role="button">Get a FREE quotation today!</button>
                </a>
            </div>
          </div>
          <?php $i++; ?>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  @else
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="https://via.placeholder.com/700x250" alt="First slide">
            </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://via.placeholder.com/700x250" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://via.placeholder.com/700x250" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  @endif
  