<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input { width: 100%; padding: 10px; margin-top: 6px; box-sizing: border-box; }
        button, .back { display: inline-block; margin-top: 20px; padding: 10px 16px; background: #2563eb; color: white; border: 0; text-decoration: none; border-radius: 5px; cursor: pointer; }
        .avatar { width: 130px; height: 130px; border-radius: 50%; object-fit: cover; display: block; margin: 10px 0; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 5px; }
        .alert-success { background: #dcfce7; }
        .alert-danger { background: #fee2e2; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit User</h1>
    @include('partials.alerts')
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="username">Username</label>
        <input id="username" type="text" name="username"
               value="{{ old('username', $user->username) }}" required>
        @error('username') <small>{{ $message }}</small> @enderror

        <label for="full_name">Full Name</label>
        <input id="full_name" type="text" name="full_name"
               value="{{ old('full_name', $user->full_name) }}" required>
        @error('full_name') <small>{{ $message }}</small> @enderror

        <label>Current Avatar</label>
        <img class="avatar"
             src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar-placeholder.svg') }}"
             alt="User avatar">

        <label for="avatar">Upload New Avatar (JPG, PNG, WEBP – max 2MB)</label>
        <input id="avatar" type="file" name="avatar" accept="image/jpeg,image/png,image/webp">
        @error('avatar') <small>{{ $message }}</small> @enderror

        <button type="submit">Update User</button>
        <a class="back" href="{{ route('users.index') }}">Back</a>
    </form>
</div>
</body>
</html>
