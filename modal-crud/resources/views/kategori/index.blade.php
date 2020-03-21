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
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew">
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
                  <td>
                  	<button class="btn btn-primary" data-mytitle="{{ $cat->title }}" data-description="{{ $cat->description }}" data-toggle="modal" data-target="#edit" data-catid="{{ $cat->id }}">Edit</button>
                  	<button class="btn btn-danger" data-toggle="modal" data-target="#delete" data-catid="{{ $cat->id }}">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

	    <!-- Modal Add New-->
	    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewTitle" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="addNewTitle">New Category</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <form action="{{ route('kategori.store') }}" method="post">
	          	@csrf
	            <div class="modal-body">
		          @include('kategori._form')
	          	</div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>

		<!-- Modal Edit-->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editCategory" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editCategory">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('kategori.update', $cat->id) }}" method="post">
              	@method('PATCH')
              	@csrf
                <div class="modal-body">
                  <input type="hidden" name="category_id" id="cat_id">
    	          @include('kategori._form')
              	</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

		<!-- Modal Delete-->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="deleteCategory">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('kategori.destroy', $cat->id) }}" method="post">
              	@method('delete')
              	@csrf
                <div class="modal-body">
                	<p class="text-center">Are you sure?</p>
                  <input type="hidden" name="category_id" id="cat_id" value="">
              	</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> No, Cancel</button>
                  <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Yes, Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
@endsection