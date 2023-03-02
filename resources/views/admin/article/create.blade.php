{{-- @include('sweetalert::alert') --}}

@extends('layout')

@section('body-content')
<form enctype="multipart/form-data" action="{{url('admin/article/store')}}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Article Title</label>
        <input type="text" name="title" class="form-control" placeholder="Article Title">
      </div>
      <div class="form-group">
        <label>Short Description</label>
        <input type="text" name="short_description" class="form-control" placeholder="Short Description">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea id="" class="form-control" name="content" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label>Cover</label>
        <input type="file" name="cover" class="form-control">
      </div>
      <div class="form-group">
        <label>User</label>
        <select name="user_id">
          @foreach ($users as $user)
          {{-- <input class="form-control" type="text" name="user_id" value="{{$user->name}}" disabled> --}}
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Category</label>
        <select name="category_id">
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary col-1">
      </div>
    </div>
  </form>
@endsection
