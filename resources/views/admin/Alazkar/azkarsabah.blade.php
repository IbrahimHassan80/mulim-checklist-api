@extends('admin.layout.master')
@section('content')
@section('title','Azkar Almasaa')
  
  <table class="table table-bordered text-center">
    <thead class="thead-light">
        <tr>
          <th scope="col">{{__('messages.count')}}</th>
          <th scope="col">{{__('messages.title')}}</th>
          <th scope="col">{{__('messages.alzekr')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($azkar as $zekr)
        <tr>
            <td>{{$zekr->count}}</td>
            <td>{{$zekr->title}}</td>
            <td>{{$zekr->content}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

@stop