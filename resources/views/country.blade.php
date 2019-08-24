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
			<h4>Laravel PDF Example</h4>
		</center>
		<br/>
		<a href="/country/print_pdf" class="btn btn-success" target="_blank">PRINT PDF</a>
		<br><br>
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
				@php $i=1 @endphp
				@foreach($country as $c)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$c->Code}}</td>
					<td>{{$c->Name}}</td>
					<td>{{$c->Continent}}</td>
					<td>{{$c->Region}}</td>
					<td>{{$c->HeadOfState}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>