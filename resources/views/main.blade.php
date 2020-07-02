<style>
    hr{
        background-color: white!important;
        margin: 0.2rem!important;

    }
</style>
<div class=" pt-3 text-light">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-12">
           <div class="row pt-3">
               <div class="mx-auto">
                   <b>Categories</b>
                   <hr>
               </div>
           </div>

           @foreach ($categories as $item)
            <div class="row">
                <div class="mx-auto">
                    <a href="{{route('search', ['id'=>$item->id])}}" class="text-light small">{{$item->category_name}}</a>
                </div>
            </div>

           @endforeach
        </div>
        <div class="col-lg-10 col-md-10 col-12">
            <div class="row pt-3">
                <div class="mx-auto">
                    <b>Trending Products</b>
                    <hr>
                </div>
            </div>

        @include('productlist')

        </div>
    </div>

</div>
