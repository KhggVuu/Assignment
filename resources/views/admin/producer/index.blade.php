@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-header">
                <h4>
                    Producer
                    <a href="{{ url('admin/producer/create')}}" class="btn btn-primary float-right">Add Producer</a>
                </h4>
            </div>
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            <div class="card-body">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>IDs</th>
                        <th>Producer name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row )
                        <tr>
                            <td>{{$row->producerID}}</td>
                            <td>{{$row->producerName}}</td>
                            <td>
                                <a href="{{url('admin/producer/edit/'. $row->producerID)}}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/producer/delete/'. $row->producerID)}}" class="btn btn-danger"
                                    onclick="return confirm ('are you sure!');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
