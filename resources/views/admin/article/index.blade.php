
@extends('layout')

@section('body-content')

@include('sweetalert::alert')

<table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Article Name</th>
        <th>Short Description</th>
        <th>Cover</th>
        <th>User</th>
        <th>Category</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->short_description }}</td>
            <td><img width="100px" height="100px" src="{{asset("uploads/$article->cover")}}" alt="{{$article->title}}"></td>
            <td>{{ $article->user->name ?? 'None'}}</td>
            <td>{{ $article->category->name ?? 'None' }}</td>
            <td><a class="btn btn-warning" href='{{url("admin/article/edit/$article->id")}}'>Update</a></td>
            <td><a class="btn btn-danger" href='{{url("admin/article/delete/$article->id")}}'>Delete</a></td>
          </tr>
        @empty
        <tr>
          <td class="text-center" colspan="8">There's no Articles</td>
        </tr>
        @endforelse

    </tbody>
  </table>
@endsection
