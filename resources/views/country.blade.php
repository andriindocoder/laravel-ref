<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<br>
		<center>
			<h4>Laravel Reference</h4>
		</center>
		<br/>
		

		<div class="row">
			<div class="col-md-6">
				<h4>Countries</h4>
			</div>
			<div class="col-md-4">
				<form action="/search" method="get">
					<div class="input-group">
						<input type="search" class="form-control" name="search" placeholder="Search Country Name or Head of State">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Search</button>
						</span>
					</div><!-- /input-group -->
				</form>
			</div>
			<div class="col-md-2 text-right">
				<a href="/country/print_pdf" class="btn btn-success" target="_blank">PRINT PDF</a>
			</div>	
		</div>
		<br>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Code</th>
					<th>Name</th>
					<th>Continent</th>
					<th>Region</th>
					<th>Head of State</th>
				</tr>
			</thead>
			<tbody>
				@foreach($country as $key => $c)
				<tr>
					<td>{{ $key + $country->firstItem() }}</td>
					<td>{{$c->Code}}</td>
					<td>{{$c->Name}}</td>
					<td>{{$c->Continent}}</td>
					<td>{{$c->Region}}</td>
					<td>{{$c->HeadOfState}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<br/>
		Halaman : {{ $country->currentPage() }} <br/>
		Jumlah Data : {{ $country->total() }} <br/>
		Data Per Halaman : {{ $country->perPage() }} <br/>

		{{ $country->links() }}
	</div>

</body>
</html>