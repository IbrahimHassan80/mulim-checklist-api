@extends('admin.layout.master')
@section('title','Edit User')
@section('content')

<form class="col-md-8" method="POST" action="{{route('store.edit.user',$user->id)}}">
  @csrf @method('put') 
  <div class="mb-3">
      <label for="exampleInputfname" class="">{{__('messages.first_name')}}</label>
      <input value="{{$user->first_name}}" name="first_name" type="text" class="form-control" id="exampleInputfname">
      @error('first_name')
      <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
  
    <div class="mb-3">
      <label for="exampleInputsname" class="form-label">{{__('messages.second_name')}}</label>
      <input value="{{$user->second_name}}" name="second_name" type="text" class="form-control" id="exampleInputsname">
      @error('second_name')
      <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">{{__('messages.email')}}</label>
      <input value="{{$user->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('email')
       <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputphone" class="form-label">{{__('messages.mobile')}}</label>
      <input value="{{$user->mobile}}" name="mobile" type="text" class="form-control" id="exampleInputphone">
      @error('mobile')
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
      <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
</form>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif
<br><br>
@endsection