<div class="row">
  <div class="col-lg-12">
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
        <hr>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ $category->exists? 'Update' : 'Save' }}</button>
        <a href="{{ route('backend.categories.index') }}" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->