@extends('admin.layout.master')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">operations</th>
      </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
        <td>{{ $var++ }}</td>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>
            <a class="btn btn-danger" href="{{route('admin.delete', $admin->id)}}">Delete</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>

@stop