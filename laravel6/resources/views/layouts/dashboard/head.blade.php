<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>@yield('title', 'Laravel 6 Blog')</title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('dashboard-asset/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dashboard-asset/dist/css/adminlte.min.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dashboard-asset/plugins/simplemde/dist/simplemde.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('dashboard-asset/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-asset/plugins/summernote/summernote-bs4.css')}}">