
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
    <div class="container mx-auto flex items-center space-x-6">
        <a href="{{ url('/') }}" class="text-white hover:text-gray-300">Home</a>
        <a href="{{ route('assessments.index') }}" class="text-white hover:text-gray-300">Assessments</a>
        <a href="{{ route('inventories.index') }}" class="text-white hover:text-gray-300">Inventories</a>
    </div>
</nav>


    <div class="container">
        @yield('content')
    </div>
</body>
</html>
