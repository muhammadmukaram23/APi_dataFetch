<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Subscription</title>
</head>
<body>
    <h2>Email Subscription</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('subscription.submit') }}" method="POST">
        @csrf
        <label for="email">Enter your email:</label>
        <input type="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>
