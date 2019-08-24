<!DOCTYPE html>
<html>
<head>
	<title>Laravel PDF Example</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		.title{
			font-family: 'Arial','sans-serif';
			font-size: 15pt;
		}
	</style>
	<center>
		<h5 class="title">Laravel PDF Example</h4>
	</center>

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

</body>
</html>