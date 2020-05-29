@if ($message = session('message'))
  <div class="alert alert-success">{{ $message }}</div> 
@elseif ($message = session('error-message'))
  <div class="alert alert-danger">{{ $message }}</div> 
@elseif(session('trash-message'))
		<?php list($message, $postId) = session('trash-message') ?>
		{!! Form::open(['method' => 'PUT', 'route' => ['backend.blog.restore', $postId]]) !!}
			<div class="alert alert-info">
				{{ $message }}
				<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Undo</button>
			</div> 
		{!! Form::close() !!}
@endif