<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
<nav>
<ul>
    <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="{{route('main.index')}}">Main</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('about.index')}}">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('contacts.index')}}">Contacts</a>
  </li>
</ul>





</nav>
    </div>
    @yield('content')
</div>
</body>
</html>