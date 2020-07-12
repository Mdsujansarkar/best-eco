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
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user">
               
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Category Title">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Category slug">
                </div>
                <div class="form-group">
                  
                  <label><input type="radio" name="optradio">Publish</label>
                  <label><input type="radio" name="optradio">Unpublish</label>
                </div>
               
                <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Category Title
                </a>
              </form>
             
            </div>
          </div>

            </div>
          </div>
@endsection