<style>
    .h{
        height: 100vh!important;
    }
    .thumbnail{
        height: 30vh!important;
        width:20vw!important;
    }


    @media(max-width: 730px){
        .thumbnail{
            width:100%!important;
                height:30vh!important
}
    }



</style>
@extends('layouts.market')
@section('content')

<div class="container pt-5 h">
 <div class="jumbotron black">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">

             @foreach ($productDetails as $item)
             <div class="row">
             @foreach ($item->images as $thumbnail)
             <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{Storage::url($thumbnail->path)}}" class="thumbnail " >
             </div>
             @endforeach
            </div>
             @endforeach


    </div>
    <div class="col-lg-1 col-md-1 col-sm-12 ">
    </div>
        <div class="col-lg-5 col-md-5 col-sm-12 ">

               <div class="card ">
                   <div class="card-body">
                       <h3 class="card-title">{{$productDetails[0]->name}}</h3>
                       <p class="card-text"><span class="mr-2">{{$productDetails[0]->currency}}</span>{{$productDetails[0]->price}}</p>
                       <p class="card-text">{{$productDetails[0]->category}}</p>
                   </div>
                   <div class="card-footer">
                       <p>{{$productDetails[0]->description}}</p>
                   </div>
               </div>
               <div  class="row pt-2">
                  <div class="mx-auto"> <a href="{{route('add.item.to.cart',['id'=>$productDetails[0]->id])}}" class="btn btn-sm btn-round btn-danger"> <span>add to cat</span></a></div>

            </div>

           </div>


  </div>
 </div>
</div>
@endsection
