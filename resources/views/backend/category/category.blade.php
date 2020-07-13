@extends('backend.master')
@section('home')
 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">

               <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
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
                <h1 class="h4 text-gray-900 mb-4">Create Category</h1>
              </div>
              <form class="user" action="{{route('category.create')}}" method="post">
               @csrf
                <div class="form-group">
                  <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Category Title">
                </div>
                <div class="form-group">
                 <select class="custom-select" name="status">
                      <option value="1">Action</option>
                      <option value="0">Inactive</option>
                  </select>
                </div>
                <button class="btn btn-primary btn-block" name="btn">Category Insert</button>
              </form>
             
            </div>
          </div>

            </div>
          </div>
@endsection