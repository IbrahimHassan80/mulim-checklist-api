@extends('admin.layout.master')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.first_name')}}</th>
        <th scope="col">{{__('messages.second_name')}}</th>
        <th scope="col">{{__('messages.email')}}</th>
        <th scope="col">{{__('messages.mobile')}}</th>
        <th scope="col">{{__('messages.operations')}}</th>
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
            <a class="btn btn-danger" href="{{route('delete.user', $user->id)}}">{{__('messages.delete')}}</a>
            <a class="btn btn-primary" href="{{route('edit.user', $user->id)}}">{{__('messages.edit')}}</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>

@stop