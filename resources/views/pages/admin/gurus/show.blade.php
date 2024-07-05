<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Guru</title>
</head>
<body>
<div class="container mt-5">
    <h1>Lihat Guru</h1>
    <div class="card">
        <div class="card-header">
            {{ $guru->name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $guru->email }}</p>
            <p><strong>Created At:</strong> {{ $guru->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $guru->updated_at }}</p>
            <a href="{{ route('gurus.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
