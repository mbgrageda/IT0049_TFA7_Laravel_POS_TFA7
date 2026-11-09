// Add these imports at the top of your EXISTING routes/web.php:
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

// Add these routes to your existing route definitions.
// Keep all of your other TFA6 routes.
Route::resource('customers', CustomerController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::resource('users', UserController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);
