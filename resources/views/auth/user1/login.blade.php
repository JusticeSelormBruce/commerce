
<div class="container">
    <div class="row justify-content-center text-light">
        <div class="col-lg-4 col-md-4col-sm-12">
            <img src="{{asset('icons/shopping-cart.png')}}"  alt="">
        </div>
        <div class="col-md-8 mt-lg-5 mt-md-5 mt-sm-1">
            <div class="mt-3">
                <div class="">Multifactor Authentication face 2</div>

                <div class=" ">
                    <form method="POST" action="/user1-auth">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                               <input type="text" class="form-control" required name="phone">
                            </div>
                            <div>
                               {{$errors->first('phone')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                               <input type="email" class="form-control" required name="email">
                            </div>
                            <div>
                                {{$errors->first('email')}}
                             </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                 Continue
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

