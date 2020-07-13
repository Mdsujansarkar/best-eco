@extends('backend.master')
@section('home')
 <!-- Page Heading -->
           <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Category Sl NO.</th>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Category Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Category Sl NO.</th>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Category Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@php($i = 0)
                  	@foreach($categories as $category)
                    <tr>
                      <td>{{ $i++}}</td>
                      <td>{{$category -> name}}</td>
                      <td>{{$category -> slug}}</td>
                      <td>{{$category -> status == 1 ? 'Active':'Inactive'}}</td>
                      <td>
                      	<a href="" title="Edit"><i class="fas fa-edit"></i></a>
                      	<a href="" title="Active"><i class="far fa-arrow-alt-circle-up"></i></a>
                      	<a href="" title="Inactive"><i class="far fa-arrow-alt-circle-down"></i></a>
                      	<a href="" title="Delete"><i class="far fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$categories->links()}}
              </div>
            </div>
          </div>

        </div>
@endsection