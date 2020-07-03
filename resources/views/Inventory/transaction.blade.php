@extends('layouts.admin')
@section('render')
<div class="jumbotron">
    <table id="table_id" class="table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Transaction Date</th>

        </tr>
        </thead>
        <tbody>

        @foreach($transactions as $product)


        <tr>
            <td>{{$product->id}}</td>
            <td   @foreach ($items as $item) @if ($item->id == $product->items_id) @endif     @endforeach>{{$item->name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->amount}}</td>
            <td class="bg-secondary">   <?php $price = $product->quantity  * $product->amount ?>(GHC) <span class="mx-1"></span> {{$price}}</td>
            <td>{{$product->created_at}}</td>


        </tr>

        @endforeach
     
        </tbody>
    </table>
</div>
@endsection
