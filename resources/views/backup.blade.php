@extends('layouts.admin')
@section('render')

<div class="container mt-5">
    <div class="jumbotron">
        <div class="row">
            <div class="ml-auto">
                <a href="/backup" class="btn btn-sm btn-primary">Backup Database</a>
            </div>
        </div>
        <table id="table_id" class="table table-striped">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Process</th>
                        <th>Completed</th>
                        <th>Status</th>
                        <th>Date and Time</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($backups as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->process}}</td>
                            <td>{{$item->completed}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                      @endforeach
                  </tbody>
        </table>
    </div>
</div>
@endsection
