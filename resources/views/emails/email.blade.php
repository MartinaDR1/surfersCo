<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Form</h1>
    <p><strong>Name:</strong> {{ $formData['name'] }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] }}</p>
    <p><strong>Birth Place:</strong> {{ $formData['birthPlace'] ?? '' }}</p>
    <p><strong>Birthday:</strong> {{ $formData['birthday'] }}</p>
    <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
    <p><strong>Company:</strong> {{ $formData['company'] ?? '' }}</p>
    <p><strong>Message:</strong> {{ $formData['message'] }}</p>
</body>
</html>
