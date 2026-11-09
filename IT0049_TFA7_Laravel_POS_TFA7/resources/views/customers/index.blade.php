<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; padding: 30px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 12px; text-align: left; }
        a.button { display: inline-block; padding: 9px 13px; background: #2563eb; color: white; text-decoration: none; border-radius: 5px; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 5px; }
        .alert-success { background: #dcfce7; }
        .alert-danger { background: #fee2e2; }
    </style>
</head>
<body>
<div class="container">
    <h1>Customer Accounts</h1>
    @include('partials.alerts')
    <a class="button" href="{{ route('customers.create') }}">+ Create Customer</a>
    <table>
        <thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Action</th></tr></thead>
        <tbody>
        @forelse ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->email }}</td>
                <td><a href="{{ route('customers.edit', $customer) }}">Edit</a></td>
            </tr>
        @empty
            <tr><td colspan="4">No customers found.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $customers->links() }}
</div>
</body>
</html>
