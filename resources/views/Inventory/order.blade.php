
@extends('layouts.admin')
@section('render')
<div class="container mt-5 ">

    <div >
        <table id=table_id>
            <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th> (GHC) price</th>
                <th>Date and Time</th>

            </tr>

            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->product->price}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
