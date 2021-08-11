@extends('admin.layout.master')
@section('title','Add Admins')

@section('content')

<form class="col-md-8" method="POST" action="{{route('admin.store')}}">
  @csrf  
  <div class="mb-3">
      <label for="exampleInputname" class="form-label">{{__('messages.name')}}</label>
      <input name="name" type="text" class="form-control" id="exampleInputname">
      @error('name')
      <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">{{__('messages.email')}}</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('email')
       <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">{{__('messages.password')}}</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
      @error('password')
          <span class="text-danger">{{$message}} </span>
        @enderror
    </div>
    
    <div class="mb-3">
    <label for="role" style="font-weight: bold">{{__('messages.role')}}</label>
      <select name="role[]" id="role" class="form-select" multiple aria-label="multiple select example">
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
      </select>

    </div>
      <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
</form>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif
  
@endsection