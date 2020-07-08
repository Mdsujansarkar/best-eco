@extends('frontend.master')

@section('home')
  <div class="row">
  <div class="container">
    <div class="col-md-12 text-center">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if(session()->has('message'))
    <div class="alert alert-{{ session('type') }}">
      {{ session('message')}}
    </div>
    @endif
    </div>
  </div>
</div>
<div class="text-center login">

    <form class="form-signin" action="{{route('login.process')}}" method="post">
      @csrf
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Email address" value="{{old('email')}}" required />
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" naeme="btn" type="submit">Sign in</button>
    </form>
  </div>
@endsection