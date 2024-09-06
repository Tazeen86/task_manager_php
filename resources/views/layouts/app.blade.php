<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with Vite</title>
    
    <!-- Vite Styles -->
    @vite('resources/css/app.css')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Task Manager</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
            </li>
        </ul>
    </div>
</nav>

    <div id="app">
        @yield('content')
    </div>

    <!-- Vite Scripts -->
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

</body>
</html>
