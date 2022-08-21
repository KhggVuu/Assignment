<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Product- in Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">


        <!-- Google Web Fonts -->
        <link rel="preconnect" href="{{ url('https://fonts.googleapis.com')}}">
        <link rel="preconnect" href="{{ url('https://fonts.gstatic.com')}}" crossorigin>
        <link href="{{ url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap')}}" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"')}} rel="stylesheet">
        <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ url('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ url('css/style.css')}}" rel="stylesheet">
    </head>

<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="{{ url('admin/dashboard')}}" class="text-decoration-none">
                        <h2><span>Product List</span>
                        </h2>
                    </a>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>IDs</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Detail</th>
                            <th>Producer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row )
                            <tr>
                                <td>{{$row->productID}}</td>
                                <td>{{$row->productName}}</td>
                                <td>{{$row->productPrice}}</td>
                                <td>
                                    <a href=""><img src="public/image/{{$row->productImage1}}"
                                        style="height: 90px; width:90px"
                                        title="{{$row->productDetails}}"></a>
                                </td>
                                <td>{{$row->productDetails}}</td>
                                <td>{{$row->producerName}}</td>
                                <td>
                                    <a href="{{url('edit/'. $row->productID)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('delete/'. $row->productID)}}" class="btn btn-danger"
                                        onclick="return confirm ('are you sure!');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>

  </body>
