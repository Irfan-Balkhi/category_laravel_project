<!DOCTYPE html>
<html>
<head>
    <title>Category Details</title>
</head>
<body>
    <h1>Category Details</h1>
    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Description:</strong> {!! $category->description !!}</p>
    <p><strong>Status:</strong> {{ $category->status ? 'Visible' : 'Hidden' }}</p>
</body>
</html>
