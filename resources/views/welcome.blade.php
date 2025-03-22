<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-8">Welcome to the Dive Management System</h1>

        <div class="space-x-4">
           
            <a href="{{ route('assessments.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition">
                Manage Assessments
            </a>

            <a href="{{ route('inventories.index') }}" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 transition">
                Manage Inventories
            </a>
            <a href="{{ url('/') }}" class="bg-gray-500 text-white px-6 py-3 rounded cursor-not-allowed opacity-50">
                Other function link 01
            </a>
            <a href="{{ url('/') }}" class="bg-gray-500 text-white px-6 py-3 rounded cursor-not-allowed opacity-50">
                Other function link 02
            </a>
        </div>
    </div>

</body>
</html>
