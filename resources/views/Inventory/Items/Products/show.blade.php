

@extends('layouts.admin')
@section('render')
<div class="container mt-5">
<div class="row">
    @foreach ($images as $item)
<div class="col-lg-3 colmd-4 col-sm-6 py-3">
 <img src="{{Storage::url($item->path)}}" class="d-block w-100  img-thumbnail" >
</div>
@endforeach
</div>
</div>
@endsection
