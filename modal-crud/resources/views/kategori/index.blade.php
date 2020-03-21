@extends('layouts.master')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Categories</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Home</a></li>
	          <li class="breadcrumb-item active">All Categories</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
	  <div class="container-fluid">
	    <!-- Button trigger modal -->
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
	      <i class="fa fa-plus-circle"></i> Add New
	    </button>

	    <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">All Categories</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $cat)
                <tr>
                  <td>{{ $cat->id }}</td>
                  <td>{{ $cat->title }}</td>
                  <td>{{ $cat->description }}</td>
                  <td><span class="badge bg-danger">55%</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

	    <!-- Modal -->
	    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalCenterTitle">New Category</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <form action="{{ route('kategori.store') }}" method="post">
	          	@csrf
		          <div class="modal-body">
		            <div class="form-group">
		            	<label for="title">Title</label>
		            	<input type="text" class="form-control" name="title" id="title">
		            </div>
		            <div class="form-group">
		            	<label for="des">Description</label>
		            	<textarea cols="20" rows="5" class="form-control" name="description" id="des"></textarea>
		            </div>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
		          </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
@endsection