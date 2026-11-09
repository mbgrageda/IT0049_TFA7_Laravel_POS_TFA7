<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; padding: 30px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 12px; text-align: left; }
        .avatar { width: 55px; height: 55px; border-radius: 50%; object-fit: cover; }
        a.button { display: inline-block; padding: 9px 13px; background: #2563eb; color: white; text-decoration: none; border-radius: 5px; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 5px; }
        .alert-success { background: #dcfce7; }
        .alert-danger { background: #fee2e2; }
    </style>
</head>
<body>
<div class="container">
    <h1>User Accounts</h1>
    @include('partials.alerts')
    <a class="button" href="{{ route('users.create') }}">+ Create User</a>
    <table>
        <thead><tr><th>Avatar</th><th>ID</th><th>Username</th><th>Full Name</th><th>Action</th></tr></thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>
                    <img class="avatar"
                         src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar-placeholder.svg') }}"
                         alt="{{ $user->full_name }} avatar">
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->full_name }}</td>
                <td><a href="{{ route('users.edit', $user) }}">Edit</a></td>
            </tr>
        @empty
            <tr><td colspan="5">No users found.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>
</body>
</html>
