@extends('layouts.dashboard-template')
@section('content')
<style>
  nav.mt-4 {
    margin-top: 0 !important;
  }
  a.selected-status {
    font-weight: bold;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog List</h1>
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
            <div class="card-header clearfix">
              <div class="float-left">
                <a href="{{ route('backend.blog.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
              </div>
              <div class="float-right">
                <?php $links = [] ;?> 
                @foreach($statusList as $key => $value)
                  @if($value)
                    <?php $selected = Request::get('status') == $key ? 'selected-status' : '';?>
                    <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">".ucwords($key)."({$value})</a>";?>
                  @endif
                @endforeach
                {!! implode(' | ', $links) !!}
              </div>
            </div>
            <!-- /.card-header -->
            @if(!$posts->count())
            <div class="alert alert-danger" style="margin: 10px 15px;">
              No Record Found
            </div>
            @else
              @if($onlyTrashed)
                @include('backend.blog.table-trash')
              @else
                @include('backend.blog.table')
              @endif
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