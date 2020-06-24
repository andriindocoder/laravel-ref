<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Validation</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-offset-4 col-lg-4">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
						<p class="alert alert-danger">
							{{ $error }}
						</p>
					@endforeach
				@endif 
				<form action="" method="post">
					@csrf
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>