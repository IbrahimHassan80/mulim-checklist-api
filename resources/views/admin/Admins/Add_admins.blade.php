@extends('admin.layout.master')
@section('content')

<form class="col-md-8" method="POST" action="{{route('admin.store')}}">
  @csrf  
  <div class="mb-3">
      <label for="exampleInputname" class="form-label">Name</label>
      <input name="name" type="text" class="form-control" id="exampleInputname">
      @error('name')
      <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('email')
       <span class="text-danger">{{$message}} </span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
      @error('password')
          <span class="text-danger">{{$message}} </span>
        @enderror
    </div>
    
    <div class="mb-3">
    <label for="role" style="font-weight: bold">Role</label>
      <select name="role" id="role" class="form-select" aria-label="Default select example">
        <option selected>Select Role</option>
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
      </select>

    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
   
</form>

  @endsection