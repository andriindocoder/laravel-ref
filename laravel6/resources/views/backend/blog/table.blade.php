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
            {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
            <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-primary">
              <i class="fa fa-pencil-alt"></i>
            </a>
            <button type="submit" class="btn btn-sm btn-danger">
              <i class="fa fa-trash"></i>
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