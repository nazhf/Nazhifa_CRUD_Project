<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Us</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/contacts" method="POST">
        @csrf <!-- Token CSRF untuk keamanan -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
