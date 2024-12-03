<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Blog Minimaliste')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrapmain.css">
    <!-- Add Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <!-- Dark Navbar -->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Mon Blog</a> -->
                <div>
                    <a class="btn btn-outline-light" href="{{ url('/dashboard') }}">Accueil</a>
                    <a class="btn btn-outline-light" href="#">Créer un Article</a>
                    
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="content">
            @yield('content')
        </div>
        <aside>
            @yield('sidebar')
        </aside>
    </main>

    <footer>
        <p>&copy; 2024 Mon Blog Minimaliste</p>
    </footer>

    <!-- Add Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
