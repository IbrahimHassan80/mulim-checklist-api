@extends('admin.layout.master')
@section('title','Show Admins')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.name')}}</th>
        <th scope="col">{{__('messages.email')}}</th>
        <th scope="col">{{__('messages.operations')}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
        <td>{{ $var++ }}</td>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>
          <a class="btn btn-primary" href="{{route('admin.edit', $admin->id)}}">{{__('messages.edit')}}</a>
          <a class="btn btn-danger" href="{{route('admin.delete', $admin->id)}}">{{__('messages.delete')}}</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
@stop