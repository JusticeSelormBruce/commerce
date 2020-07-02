<style>
    .img-preview{
        width: auto!important;
        height:auto!important
    }
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark  btn-sm " data-toggle="modal"
        data-target="#exampleModalLongdelwe{{$product->id}}">
    <span class=" text-capitalize">Upload Image</span>
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModalLongdelwe{{$product->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitledelwe{{$product->id}}"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="/admin/product-save-image"  method="post" class="mx-2 py-2" enctype="multipart/form-data">
                @csrf
                     <div class="card-body">
                         <div class="jumbotron">
                        <div class="col-lg-4 col-md-4 col-sm-12 input-group-sm">
                            <input type="file" name="path" required
                                   onchange="document.getElementById('value').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 input-group-sm py-2">
                            <img class="img-preview" id="value"/>
                        </div>
                         </div>
                     <input type="hidden" name="product_id" value="{{$product->id}}">



                     </div>
                <div class="card-footer">
                  <div class="row">
                      <div class="mx-auto">
                        <button class=" btn btn-primary btn-sm"> <span class="mx-2">upload</span></button>
                      </div>
                  </div>
                </div>
            </form>


        </div>
    </div>
</div>

