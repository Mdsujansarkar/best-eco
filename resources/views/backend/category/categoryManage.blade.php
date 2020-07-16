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
                      	<a href="{{route('category.edit', [ 'id' => $category -> id ] ) }}" class="btn btn-danger btn-block" title="Edit" role="button"><i class="fas fa-edit"></i></a>
                        @if($category -> status == 1)
                      	<a href="{{route('category.inactive', [ 'id' => $category -> id ])}}" class="btn btn-danger btn-block" title="Active"><i class="far fa-arrow-alt-circle-up"></i></a>
                        @else
                      	<a href="{{route('category.active', [ 'id' => $category -> id ])}}" class="btn btn-danger btn-block" title="Inactive"><i class="far fa-arrow-alt-circle-down"></i></a>
                        @endif
                        <form action="{{route('category.delete',[ 'id' => $category -> id ]) }}" method="post" style="margin-top:10px">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-block">
                              <i class="far fa-trash-alt"></i>
                          </button>
                        </form>
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