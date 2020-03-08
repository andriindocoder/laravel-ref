@extends('layouts.dashboard-template')
@section('title', 'Add New Post')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add New Blog</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('backend.blog.index') }}">Add New</a></li>
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
            <div class="card-body">
              {!! Form::model($post, [
                'method' => 'POST',
                'route' => 'backend.blog.store'    
              ])!!}

              <div class="form-group">
                {!! Form::label('title') !!}
                {!! Form::text('title', null, ['class' => ($errors->has('title')) ? 'form-control is-invalid' : 'form-control']) !!}
                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                {!! Form::label('slug') !!}
                {!! Form::text('slug', null, ['class' => ($errors->has('slug')) ? 'form-control is-invalid' : 'form-control']) !!}
                @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                {!! Form::label('excerpt') !!}
                {!! Form::textarea('excerpt', null, ['class' => ($errors->has('excerpt')) ? 'form-control is-invalid' : 'form-control']) !!}
                @error('excerpt')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                {!! Form::label('body') !!}
                {!! Form::textarea('body', null, ['class' => ($errors->has('body')) ? 'form-control is-invalid' : 'form-control']) !!}
                @error('body')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                {!! Form::label('published_at', 'Publication Date') !!}
                {!! Form::text('published_at', null, ['class' => ($errors->has('published_at')) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                  @error('published_at')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => ($errors->has('category_id')) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Choose Category']) !!}
                @error('category_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <hr>

              {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}
              {!! Form::close() !!}

              {!! Form::close() !!}

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
  <script>
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@section('script')

@endsection