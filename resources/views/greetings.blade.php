@extends('layouts.app')

@section('content')
    <style>
        a{
            text-decoration: none!important;
        }
    </style>
    <div class="container py-5"></div>

    <div class="row justify-content-center text-light">
        <div class="row">
            <div class="col-lg-4 col-md-4col-sm-12">
                <img src="{{asset('icons/shopping-cart.png')}}"  alt="">
            </div>
            <div class="col-lg-8 col-smd-8 col-sm-12">
                <div class=" ">
                    <div class="lead">Welcome</div>
                    <div class="row">
                        <div class="mx-auto">
                            <span class="lead h1 text-capitalize">{{Auth::user()->name}}</span>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="mx-auto">
                            <span class=" h1 text-capitalize"><a href="/dashboard"><span class="mx-3">Navigate to Dashboard</span></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
