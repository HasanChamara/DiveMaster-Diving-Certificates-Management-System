<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Media Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .media-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .media-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .video-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <header class="text-center mb-16">
            <h1 class="text-4xl font-bold text-blue-800 mb-4">Marine Adventures</h1>
            <p class="text-xl text-gray-600">Exploring the wonders of the underwater world</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($mediaItems as $media)
            <div class="media-card bg-white rounded-lg overflow-hidden shadow-md">
                @if($media->type == 'photo')
                    <img src="{{ $media->media_url }}" alt="{{ $media->title }}" 
                         class="w-full h-64 object-cover">
                @else
                    <div class="relative">
                        <img src="{{ str_replace('.webm', '.jpg', $media->media_url) }}" 
                             alt="{{ $media->title }}" 
                             class="w-full h-64 object-cover">
                        <div class="video-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                @endif

                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                            {{ $media->type == 'photo' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ ucfirst($media->type) }}
                        </span>
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $media->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $media->notes }}</p>
                    
                    <div class="flex justify-between items-center">
                        <a href="{{ $media->media_url }}" target="_blank" 
                           class="text-blue-600 hover:text-blue-800 flex items-center">
                            <i class="fas fa-expand mr-2"></i> View Full Size
                        </a>
                        <span class="text-sm text-gray-500">
                            {{ strtoupper(pathinfo($media->filename, PATHINFO_EXTENSION)) }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>