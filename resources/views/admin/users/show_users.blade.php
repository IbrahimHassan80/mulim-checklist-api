@extends('admin.layout.master')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">first name</th>
        <th scope="col">second name</th>
        <th scope="col">email</th>
        <th scope="col">mobile</th>
        <th scope="col">operations</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>{{ $var++ }}</td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->second_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->mobile}}</td>
        <td>
            <a class="btn btn-danger" href="{{route('delete.user', $user->id)}}">Delete</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>

@stop