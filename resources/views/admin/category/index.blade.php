
@extends('layout')

@section('body-content')

@include('sweetalert::alert')

<table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Category Name</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td><a class="btn btn-warning" href='{{url("admin/category/edit/$category->id")}}'>Update</a></td>
            <td><a class="btn btn-danger" href='{{url("admin/category/delete/$category->id")}}'>Delete</a></td>
          </tr>
        @empty
        <tr>
          <td class="text-center" colspan="4">There's no Categories</td>
        </tr>
        @endforelse

    </tbody>
  </table>
@endsection
