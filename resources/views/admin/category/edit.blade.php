
@extends('layout')

@section('body-content')
<form action="{{url('admin/category/update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="card-body">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name" placeholder="name">
      </div>
      <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary col-1">
      </div>
    </div>
  </form>
@endsection
