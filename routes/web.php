<?php
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [BookController::class, 'welcome'])->name('welcome');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role; // Get the user's role
        if ($role === 'admin') {
            return view('admin.dashboard');
        } elseif ($role === 'crm') {
            return view('crm.dashboard');
        } else {
            return view('user.dashboard');
        }
    })->name('dashboard');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');



Route::group(['middleware' => 'crm'], function () {
    Route::resource('books', BookController::class)->middleware('auth');
});

Route::post('/subscribe', [BookController::class, 'subscribe'])->name('subscribe');


