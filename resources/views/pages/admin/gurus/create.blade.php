<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <title>Add New Guru</title>
</head>
<body>
<div class="container mt-5">
    <h1>Add New Guru</h1>
    <form id="guruForm" action="{{ route('gurus.store') }}" method="POST" onsubmit="return validatePassword()">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Guru</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var password_confirmation = document.getElementById("password_confirmation").value;

        if (password.length < 8) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password must be at least 8 characters!',
            });
            return false;
        }

        if (password !== password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Passwords do not match!',
            });
            return false;
        }

        return true;
    }
</script>

@if(session('success'))
<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        }).then(() => {
            window.location.href = "{{ route('gurus.index') }}";
        });
    });
</script>
@endif
</body>
</html>
