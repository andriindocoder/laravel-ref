<div class="card-body p-0">
  <table class="table table-striped">
    <thead>
    @include('backend.partials.message')
      <tr>
        <th width="15%">Action</th>
        <th>Category</th>
        <th>Post Count</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>
          <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['backend.categories.destroy', $category->id]]) !!}
            <a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">
              <i class="fa fa-pencil-alt"></i>
            </a>
            <button onclick="return confirm('Are you sure to delete this category?')" type="submit" class="btn btn-sm btn-danger">
              <i class="fa fa-times"></i>
            </button>
            {!! Form::close() !!}
          </td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->posts->count() }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
<div class="float-sm-left">
  {{ $categories->render() }}
</div>
<div class="float-sm-right">
  {{ $categoriesCount }} {{ str_plural('item', $categoriesCount) }}
</div>
</div>