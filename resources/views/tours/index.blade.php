<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Tours</title>
</head>
<body>
    <h1>Featured Tours</h1>

    @if(isset($error))
        <p style="color: red;">Error: {{ $error }}</p>
    @elseif(count($tours) > 0)
        @foreach($tours as $tour)
            <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 10px;">
                <img src="{{ $tour['custom_image'] ?? '' }}" alt="Tour Image" width="200">
                <h2>{{ $tour['tourName'] ?? 'No Title' }}</h2>
                <p><strong>City:</strong> {{ $tour['cityName'] ?? 'Unknown' }}</p>
                <p><strong>Country:</strong> {{ $tour['countryName'] ?? 'Unknown' }}</p>
                <p><strong>Price:</strong> {{ $tour['aanAmount'] ?? 'N/A' }} {{ $tour['currency'] ?? '' }}</p>
                <p><strong>Rating:</strong> ⭐ {{ $tour['rating'] ?? 'N/A' }} ({{ $tour['reviewCount'] ?? 0 }} reviews)</p>
                <a href="https://aantourism.com/tour/{{ $tour['slug'] }}" target="_blank">View Tour</a>
            </div>
        @endforeach
    @else
        <p>No tours found.</p>
    @endif
</body>
</html>
