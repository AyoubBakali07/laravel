<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <li class="nav-item">
            <a href="{{url ('/article')}}">Articles</a>
        </li>
        <li class="nav-item">
            <a href="{{url ('/article/create')}}">Cree un articles</a>
        </li>
    </div>
<main>
    @yield('content')
</main>

<footer>
    &copy; 2024
</footer>
</body>
</html>