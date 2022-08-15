@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
      @if (session('message'))
          <h2>{{ session('message')}}</h2>
      @endif
    </div>
</div>

@endsection
