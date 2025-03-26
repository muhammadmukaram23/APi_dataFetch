<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Featured Customer Reviews</h1>

        @if(isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @elseif(count($reviews) === 0)
            <div class="alert alert-warning text-center">No reviews found.</div>
        @else
            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <img src="{{ $review['user_profile_image'] ?? 'https://via.placeholder.com/100' }}" 
                                     alt="Profile Image" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="card-title">{{ $review['user_name'] ?? 'Anonymous' }}</h5>
                                <p class="text-warning">⭐ {{ $review['rating'] ?? 'N/A' }}</p>
                                <p class="card-text">"{{ $review['review_content'] ?? 'No review content available.' }}"</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
