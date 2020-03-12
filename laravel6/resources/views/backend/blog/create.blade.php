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
                'route' => 'backend.blog.store',
                'files' => TRUE   
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
              <div class="form-group excerpt">
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
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    {!! Form::text('published_at', null, ['class' => ($errors->has('published_at')) ? 'form-control datetimepicker-input is-invalid' : 'form-control datetimepicker-input ', 'placeholder' => 'Y-m-d H:i:s', 'data-target' => '#datetimepicker1']) !!}
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                
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
              <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <br>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                    <img src="https://via.placeholder.com/200x150?text=No+Image"  alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>

                @error('image')
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
@section('script')
  <script>
    $('ul.pagination').addClass('no-margin pagination-sm');

    $('#title').on('blur', function() {
      var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = theTitle.replace(/&/g,'-and-')
                  .replace(/[^a-z0-9-]+/g,'-')
                  .replace(/\-\-+/g, '-')
                  .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });

    var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] })
    var simplemde2 = new SimpleMDE({ element: $("#body")[0] })

    $('#datetimepicker1').datetimepicker({
      format: 'YYYY-DD-MM HH:mm:ss',
      buttons: {
        showToday: true,
        showClear: true,
        showClose: true
      },
      icons: {
        clear: 'fa fa-trash'
      }
    });
  </script>
@endsection