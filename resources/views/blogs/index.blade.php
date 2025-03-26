<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Blogs</title>
    <style>
        .blog-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .blog-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .blog-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        .blog-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .blog-description {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <h1>Featured Blogs</h1>

        @if(count($blogs) > 0)
            @foreach($blogs as $blog)
                <div class="blog-card">
                    <img src="{{ $blog['image'] ?? '' }}" alt="Blog Image" class="blog-image">
                    <h2 class="blog-title">{{ $blog['title'] ?? 'No Title' }}</h2>
                    <p class="blog-description">{{ $blog['seo_description'] ?? 'No Description' }}</p>
                    <a href="https://aantourism.com/blog/{{ $blog['slug'] }}" target="_blank">Read More</a>
                </div>
            @endforeach
        @else
            <p>No blogs found.</p>
        @endif
    </div>
</body>
</html>
