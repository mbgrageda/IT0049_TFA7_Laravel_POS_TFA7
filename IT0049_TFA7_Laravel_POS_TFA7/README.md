# IT0049 TFA7 – Laravel POS Code Folder

This folder separates the TFA7 implementation into individual files so you can copy them into your existing `pos-tfa6` Laravel project.

## Folder map

- `app/Http/Controllers/CustomerController.php`
- `app/Http/Controllers/UserController.php`
- `app/Models/Customer.php` (example; merge with your existing model)
- `database/migrations/add_avatar_to_users_table.php` (migration body; use Laravel's generated timestamped filename)
- `routes/web.php` (route additions; merge with existing routes)
- `resources/views/partials/alerts.blade.php`
- `resources/views/customers/create.blade.php`
- `resources/views/customers/edit.blade.php`
- `resources/views/customers/index.blade.php`
- `resources/views/users/create.blade.php`
- `resources/views/users/edit.blade.php`
- `resources/views/users/index.blade.php`
- `public/images/avatar-placeholder.svg`

## Before copying

1. Open your existing TFA6 project in VS Code.
2. Do not replace your whole `routes/web.php`, `User.php`, existing migrations, or POS layouts.
3. Merge the route additions and `avatar` fillable field into the existing files.
4. Confirm your database column names match the code (`customers.full_name`, `customers.email`, `users.username`, `users.full_name`).
5. If your user table requires a password, role, or other fields, preserve the existing TFA6 user-creation logic and add those fields to the create form/controller.

## Install and run

From the project root in the VS Code terminal:

```powershell
composer require intervention/image-laravel
php artisan storage:link
php artisan make:migration add_avatar_to_users_table --table=users
```

Copy the contents of `database/migrations/add_avatar_to_users_table.php` into the newly generated migration, then run:

```powershell
php artisan migrate
php artisan route:list --path=customers
php artisan route:list --path=users
php artisan serve
```

Open `http://127.0.0.1:8000/customers` and `http://127.0.0.1:8000/users`.

The avatar upload accepts JPG/JPEG/PNG/WEBP images up to 2 MB, resizes them to 300×300 WebP, and stores the path in `users.avatar` on Laravel's public disk.
