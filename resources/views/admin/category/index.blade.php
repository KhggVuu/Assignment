@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-header">
                <h4>
                    Category
                    <a href="{{ url('admin/category/create')}}" class="btn btn-primary float-right">Add Category</a>
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
                        <th>Category name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row )
                        <tr>
                            <td>{{$row->categoryID}}</td>
                            <td>{{$row->categoryName}}</td>
                            <td>
                                <a href="{{url('admin/category/edit/'. $row->categoryID)}}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/category/delete/'. $row->categoryID)}}" class="btn btn-danger"
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
