<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'admin_only', 'user_only']);


// Login
Route::middleware('guest')->group(function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);

    // Route::get('register', [AuthController::class, 'register']);
});
// Logut
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// Admin
Route::middleware(['auth', 'admin_only'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    Route::get('manage', [AdminController::class, 'manage']);
    Route::get('manage-add', [AdminController::class, 'manageadd']);
    Route::post('manage-add', [AdminController::class, 'manageaddus']);
    Route::get('manage-edit/{slug}', [AdminController::class, 'manageedit']);
    Route::put('manage-edit/{slug}', [AdminController::class, 'manageupdate']);
    Route::get('manage-delete/{slug}', [AdminController::class, 'delete']);
    Route::get('ticket-edit/{slug}', [AdminController::class, 'ticketedit']);
    Route::put('ticket-edit/{slug}', [AdminController::class, 'ticketupdate']);
    Route::get('ticket-delete/{slug}', [AdminController::class, 'deletetic']);
});


// User
Route::get('ticket', [UserController::class, 'index'])->middleware(['auth', 'user_only']);

// Tiket
Route::middleware(['auth'])->group(function () {
    Route::get('ticket', [TiketController::class, 'index']);
    Route::get('addticket', [TiketController::class, 'add']);
    Route::post('addticket', [TiketController::class, 'addtic']);
    Route::get('ticket-detail/{slug}', [TiketController::class, 'detailtic']);
    Route::post('ticket-detail/{slug}', [TiketController::class, 'postcoment']);
    // Route::get('ticket/search', [TiketController::class, 'search']);
});
