
<style>
    img{
        height: 70vh!important
    }
    @media(max-width: 730px){
        img{
        height: 50vh!important
    }
    }
 
</style>
@if ($data ==  null)
  <div>
      <img src="{{asset('icons/noproduct.png')}}" alt="">
  </div>
@else
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
       @if ($data->count() >= 1)
       <img src="{{Storage::url($data[0]->path)}}" class="d-block w-100" alt="...">
       <div class="carousel-caption d-none d-md-block">
       <a href="" class="btn btn-light shadow-lg btn-sm small">Visit UG main page</a>
       </div>
       @endif
      </div>
      <div class="carousel-item">
        @if ($data->count() >= 1)
        <img src="{{Storage::url($data[1]->path)}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <a href="" class="btn btn-light shadow-lg btn-sm small">Visit CU main page</a>
        </div>
        @endif
      </div>
      <div class="carousel-item">
        @if ($data->count() >=3)
        <img src="{{Storage::url($data[2]->path)}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <a href="" class="btn btn-light shadow-lg btn-sm small">Visit KNUST main page</a>
        </div>
        @endif
      </div>
      <div class="carousel-item">
        @if ($data->count() == 4)
        <img src="{{Storage::url($data[3]->path)}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <a href="" class="btn btn-light shadow-lg btn-sm small">Visit UCC main page</a>
        </div>
        @endif
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  @endif
