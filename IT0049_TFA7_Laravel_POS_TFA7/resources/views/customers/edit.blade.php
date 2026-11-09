<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input { width: 100%; padding: 10px; margin-top: 6px; box-sizing: border-box; }
        button, .back { display: inline-block; margin-top: 20px; padding: 10px 16px; background: #2563eb; color: white; border: 0; text-decoration: none; border-radius: 5px; cursor: pointer; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 5px; }
        .alert-success { background: #dcfce7; }
        .alert-danger { background: #fee2e2; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Customer</h1>
    @include('partials.alerts')
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="full_name">Full Name</label>
        <input id="full_name" type="text" name="full_name"
               value="{{ old('full_name', $customer->full_name) }}" required>
        @error('full_name') <small>{{ $message }}</small> @enderror

        <label for="email">Email Address</label>
        <input id="email" type="email" name="email"
               value="{{ old('email', $customer->email) }}" required>
        @error('email') <small>{{ $message }}</small> @enderror

        <button type="submit">Update Customer</button>
        <a class="back" href="{{ route('customers.index') }}">Back</a>
    </form>
</div>
</body>
</html>
