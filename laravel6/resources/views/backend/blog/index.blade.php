@extends('layouts.dashboard-template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog Index</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active">Display All Posts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="15%">Action</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($posts as $post)
	                  <tr>
	                    <td>
	                    	<a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-primary">
	                    		<i class="fa fa-pencil-alt"></i>
	                    	</a>
	                    	<a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-sm btn-danger">
	                    		<i class="fa fa-times"></i>
	                    	</a>
	                    </td>
	                    <td>{{ $post->title }}</td>
	                    <td>{{ $post->author->name }}</td>
	                    <td>{{ $post->category->title }}</td>
	                    <td>{{ $post->created_at }}</td>
	                  </tr>
                  	@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
	            <ul class="pagination pagination-sm m-0 float-left">
	              <li class="page-item"><a class="page-link" href="#">«</a></li>
	              <li class="page-item"><a class="page-link" href="#">1</a></li>
	              <li class="page-item"><a class="page-link" href="#">2</a></li>
	              <li class="page-item"><a class="page-link" href="#">3</a></li>
	              <li class="page-item"><a class="page-link" href="#">»</a></li>
	            </ul>
	            <div class="float-sm-right">
	            	4 items
	            </div>
	          </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection