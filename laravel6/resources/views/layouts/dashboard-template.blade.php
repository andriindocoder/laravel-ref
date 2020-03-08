<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('layouts.dashboard.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.dashboard.navbar')

  @include('layouts.dashboard.sidebar')

  @yield('content')

  @include('layouts.dashboard.rightbar')

  @include('layouts.dashboard.footer')
</div>
<!-- ./wrapper -->
@include('layouts.dashboard.script')
@yield('script')
</body>
</html>
