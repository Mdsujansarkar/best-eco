@extends('frontend.master')

@section('home')
<style>
	.mt-4{
		margin-top:5px;
	}
</style>
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
		
    <form class="form-signin" action="{{route('register.process')}}" method="post">
    	@csrf
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only ">Full Name</label>
      <input type="text" class="form-control mt-4" name="full_name" placeholder="Full Name" required />

       <label for="inputEmail" class="sr-only mt-4">Email</label>
      <input type="email" class="form-control mt-4" name="email" placeholder="Email" required />

      <label for="inputEmail" class="sr-only">Phone Number</label>
      <input type="text" class="form-control mt-4" name="phone_number" placeholder="Phone Number" required />

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" class="form-control mt-4" name="password" placeholder="Password" required />

      <label for="inputPassword" class="sr-only">Confirm Password</label>
      <input type="password" class="form-control mt-4" name="password_confirmation" placeholder="Confirm Password" required />

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="btn" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </div>
@endsection