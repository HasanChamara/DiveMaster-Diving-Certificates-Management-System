
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/app.js'])

</head>
<body>
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <a href="{{ route('assessments.index') }}" class="text-white">Assessments</a>
    </div>
</nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
