<style>
    .black{
        background-color: black;
    }
    .h{
        height: 100vh!important;
    }
    hr{
        background-color: white!important

    }
    .thumbnail{
        height: 20vh!important;
        width:17vw!important;
    }


    @media(max-width: 730px){
        .thumbnail{
            width:100%!important;
                height:20vh!important
}
    }

</style>
@extends('layouts.market')
@section('content')

<div class="container black h text-light">
    @include('common.alert')
    <div class="jumbotron black">
       <div class="row"> <h2 class="mx-2">My Cart</h2> <img src="{{asset('icons/shopping-cart.png')}}" alt="" class="cart-image " title="check-out"> <span class="text-danger">{{$my_cart}}</span>
    <div class="ml-auto pt-3 mr-3">

    <a href="/confirm-check-out" class="btn btn-success btn-sm"> <span class="mx-2">Check-out </span></span></a>
    </div></div>

        <hr>
        <div class="row">
            @foreach ($cart as $list)
            <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="card text-dark">
                      <div class="card-body">
                        <div class="row">
                            <h5 class="card-title">{{$list[0]->name}}</h5>
                            <div class="ml-auto mx-2"><a href="{{route('item.drop',['id'=>$list[0]->id])}}"><img src="{{asset('icons/cartd.png')}}" class="cart-image" title="drop item"></a></div>
                        </div>
                          <p class="card-text">
                            <img src="{{Storage::url($list[0]->images[0]->path)}}" class="thumbnail" >
                          </p>
                      </div>
                      <div class="card-footer">
                        <p>
                            <a  data-toggle="collapse" href="#collapseExample{{$list[0]->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$list[0]->id}}" >
                           More Details
                            </a>

                          </p>
                          <div class="collapse" id="collapseExample{{$list[0]->id}}">
                           <p>
                               {{$list[0]->description}}
                           </p>
                          </div>
                      </div>

                  </div>

            </div>


            @endforeach
        </div>
        <div class="row pt-2 text-danger">
            <div class="mx-auto">
              <i>Total Charges</i> <span class="mx-1"><b> ghc ({{$sum}})</b></span>
              <hr>
            </div>
        </div>

    </div>

</div>
@endsection
