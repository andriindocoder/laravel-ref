<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        

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
        <hr>

      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Publish</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="pull-left">
            <a id="draft-btn" class="btn btn-default">Save Draft</a>
          </div>
          <div class="pull-right">
            {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Category</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => ($errors->has('category_id')) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Choose Category']) !!}
            @error('category_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="pull-left">
            <a href="#" class="btn btn-default">Save Draft</a>
          </div>
          <div class="pull-right">
            {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
          </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Featured Image</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center" style="display: block;">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">

                <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'https://via.placeholder.com/200x150?text=No+Image' }}"  alt="...">
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
    </div>
  </div>
</div>
<!-- /.row -->