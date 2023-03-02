{{-- @include('sweetalert::alert') --}}

@extends('layout')

@section('body-content')
<form action="{{url('admin/category/store')}}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="name">
      </div>
      <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary col-1">
      </div>
    </div>
  </form>
@endsection
