<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit product</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('update')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="id">ID</label>
                        <input type="text" name="id" class="form-control" value="{{$data->productID}}" readonly>
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="name">Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter data">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="price">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter data">
                        @error('price')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="detail">Detail</label>
                        <textarea name="detail" rows="5" placeholder="Enter data" class="form-control"></textarea>
                        @error('detail')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="category">Producer</label>
                        <select name ="producer" class = "form-control">
                                @foreach ( $producers as $row )
                                    @if ($row->producerID == $data->producerID)
                                        <option selected value="{{$row->producerID}}">{{$row->producerName}}</option>
                                    @else
                                    <option value="{{$row->producerID}}">{{$row->producerName}}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div>


                    <div class="md-3">
                        <label class="form-label" for="category">Category</label>
                        <select name ="category" class = "form-control">
                                @foreach ( $categories as $row )
                                    @if ($row->categoryID == $data->categoryID)
                                        <option selected value="{{$row->categoryID}}">{{$row->categoryName}}</option>
                                    @else
                                    <option value="{{$row->categoryID}}">{{$row->categoryName}}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div>
                     <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('P-list')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
