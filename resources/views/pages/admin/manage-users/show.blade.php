<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Guru</title>
</head>
<body>
    @extends('components.navbar')
<div class="container" style="margin-top: 8rem;">
    <h1>View Guru</h1>
    <div class="card">
        <div class="card-header">
            {{ $usersData->name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $usersData->email }}</p>
            <p><strong>Created At:</strong> {{ $usersData->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $usersData->updated_at }}</p>
            <a href="{{ route('manage-users.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
