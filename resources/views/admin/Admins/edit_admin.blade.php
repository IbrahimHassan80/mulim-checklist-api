@extends('admin.layout.master')
@section('title','Edit Admins')
@section('content')

<form class="col-md-8" method="POST" action="{{route('admin.store.edit', $admin->id)}}">
  @csrf  @method('put')
  <div class="mb-3">
      <label for="exampleInputname" class="form-label">{{__('messages.name')}}</label>
      <input value="{{$admin->name}}" name="name" type="text" class="form-control" id="exampleInputname">
      @error('name')
      <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">{{__('messages.email')}}</label>
      <input value="{{$admin->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

<br>
<h2>{{__('messages.role')}}</h2>
{{-- Roles  --}}
@forelse($admin_roles as $key => $role)  
  <form id="deleterole{{$key}}{{$role}}" class="{{$key}}" action="{{route('delete.role')}}" method="POST">
      @csrf
      <input value="{{$key}}" name="role" type="hidden">
      <input value="{{$admin->id}}" name="admin" type="hidden">
      <div class="alert alert-secondary col-md-3" role="alert">
        {{$role}} <button class="btn btn-danger">{{__('messages.delete')}}</button>
    </div>
  </form>

      @empty
      <div class="alert alert-secondary col-md-3" role="alert">{{__('messages.no_role')}}</div>
@endforelse

{{-- ------- --}}
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif
  
@endsection