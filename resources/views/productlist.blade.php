
<style>
    .img-product{
        height:20vh!important;
        width: 13vw!important;
    }
    @media(max-width: 730px){
        .img-product{
                width:100%!important;
                height:30vh!important
        }

    }
</style>
<div class="row col-sm pt-2">
    @foreach ($products as $item)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card black ">
            <div class="card-body ">
                <span class="card-title"> {{ $item->name}}</span>
             <div>
          <a href="{{route('item.show',['id'=>$item->id])}}">
            <img src="{{Storage::url($item->images[0]->path)}}" class=" img-product " title="view Details">
          </a>

             </div>
             <div class="row ">
                <div class="mx-auto">

                <span class="small">    ({{$item->currency}} )<span class="ml-2"></span>  {{$item->price}}</span>
                </div>

             </div>
             <div class="row">
                 <div class="mx-auto">
                     <a href="{{route('item.show',['id'=>$item->id])}}" class="small text-primary">View Product Details</a>
                 </div>
             </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

