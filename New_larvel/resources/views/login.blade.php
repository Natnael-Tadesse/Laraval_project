@extends('layout')
@section('title','login')
@section('content')
<div class='container'>
  
<div class="mt-5">
  @if($errors->any())
  <div class="col-12">
   @foreach($errors->all() as $error)
<div class="alert alert-danger">  {{$errors}}</div>
   @endforeach
</div>
  @endif

  @if(session()->has('error'))
  <div class="alert alert-danger"> {{session('error')}} </div>
  @endif

  @if(session()->has('sucess'))
  <div class="alert alert-sucess"> {{session('sucess')}} </div>
  @endif
</div>

<form action="{{route('login.post')}}" method="POST" class='ms-auto me-auto mt-3' style='width:500px;'>
@csrf
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name='email'>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name='password' >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection