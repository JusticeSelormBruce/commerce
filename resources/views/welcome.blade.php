
@extends('layouts.market')
@section('content')
<div class="container-fluid">
    <div class="h-50 bg-white">
     <div class="container">
        @include('carousel')
     </div>
    </div>
</div>
<div class="container">
    <div class="pt-1 mx-1">
        @include('main')
            </div>
</div>

@endsection
