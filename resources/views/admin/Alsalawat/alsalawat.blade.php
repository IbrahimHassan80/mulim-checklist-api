@extends('admin.layout.master')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Alsalah</th>
        <th scope="col">Alfard</th>
        <th scope="col">alsonna before</th>
        <th scope="col">alsonna after</th>
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