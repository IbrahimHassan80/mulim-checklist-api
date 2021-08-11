@extends('admin.layout.master')

@section('title','Alsalawat')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.alsalah')}}</th>
        <th scope="col">{{__('messages.alfard')}}</th>
        <th scope="col">{{__('messages.alsonna_before')}}</th>
        <th scope="col">{{__('messages.alsonna_after')}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($alsalawat as $alsalah)
        <tr>
        <td>{{ $var++ }}</td>
        <td>{{$alsalah->type}}</td>
        <td>{{$alsalah->alfard}}</td>
        <td>{{$alsalah->alsonna_before}}</td>
        <td>{{$alsalah->alsonna_after}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
@stop