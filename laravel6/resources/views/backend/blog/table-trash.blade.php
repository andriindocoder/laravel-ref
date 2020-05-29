<div class="card-body p-0">
  <table class="table table-striped">
    <thead>
    @include('backend.partials.message')
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
            {!! Form::open(['style'=> 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
            <button title="Restore" class="btn btn-sm btn-primary">
              <i class="fa fa-undo"></i>
            </button>
            {!! Form::close() !!}
            {!! Form::open(['style'=> 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]) !!}
            <button title="Permanent Delete" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">
              <i class="fa fa-times"></i>
            </button>
            {!! Form::close() !!}
          </td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author->name }}</td>
          <td>{{ $post->category->title }}</td>
          <td>
            <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
<div class="float-sm-left">
  {{ $posts->appends( Request::query() )->render() }}
</div>
<div class="float-sm-right">
  {{ $postCount }} {{ str_plural('item', $postCount) }}
</div>
</div>