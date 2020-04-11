@extends('layouts.dashboard-template')
@section('content')
<style>
  nav.mt-4 {
    margin-top: 0 !important;
  }
</style>
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
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('backend.blog.index') }}">All Posts</a></li>
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
              <div class="float-right">
                <a href="{{ route('backend.blog.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
              </div>
            </div>
            <!-- /.card-header -->
            @if(!$posts->count())
            <div class="alert alert-danger" style="margin: 10px 15px;">
              No Record Found
            </div>
            @else
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                  @include('backend.blog.message')
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
                          {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
                          <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-pencil-alt"></i>
                          </a>
                          <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                          {!! Form::close() !!}
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>
                          <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
                          {!! $post->publicationLabel() !!}
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <div class="float-sm-left">
  	            {{ $posts->render() }}
              </div>
	            <div class="float-sm-right">
	            	{{ $postCount }} {{ str_plural('item', $postCount) }}
	            </div>
	          </div>
            @endif
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
@section('script')
  <script>
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>

@endsection