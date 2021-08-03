@extends('admin.layout.master')
@section('content')
@section('title','Azkar Almasaa')
  
  <table class="table table-bordered text-center">
    <thead class="thead-light">
        <tr>
            <th scope="col">العدد</th>
            <th scope="col">العنوان</th>
            <th scope="col">الذكر</th>
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