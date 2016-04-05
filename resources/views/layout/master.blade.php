<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::to('css/page.css') }}">
</head>
<body>

<header>
  <div class="container">
    @yield('header')
  </div>
</header>

<div class="container">
  @yield('container')
</div>

<footer class="footer">
  <div class="container">
    @yield('footer')
  </div>
</footer>

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>

@yield('script')