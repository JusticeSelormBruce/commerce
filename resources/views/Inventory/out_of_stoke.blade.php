@extends('layouts.admin')
@section('render')
<div class="jumbotron">
    <table id="table_id" class="table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity Left</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stock_status as $product)
        @if ($product->number <30)
        <tr class="bg-danger">
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->number}}</td>


        </tr>
        @else
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->number}}</td>


        </tr>
        @endif

        @endforeach
        </tbody>
    </table>
</div>

@endsection
