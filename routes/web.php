<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminIndex;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('landingpage');

Route::view('/', 'landingpage')->name('landingpage');
Route::view('/formulir-pendaftaran', 'formulir-pendaftaran')->name('formulir.pendaftaran');
Route::view('/cari-pendonor', 'cari-pendonor')->name('cari.pendonor');

Route::get('/dashboard', function () {
    return redirect()->route('admin.index');
})->middleware(['auth'])->name('dashboard');

// admin access
Route::middleware(['auth', 'verified', 'can:admin access'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndex::class)->name('index');

    // roles & permissions
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/roles', RoleController::class);

    // users
    Route::resource('/users', UserController::class);

    // bulk delete
    Route::delete('/bulk-delete/permissions', [PermissionController::class, 'massDelete'])->name('permissions.bulkDelete');
    Route::delete('/bulk-delete/roles', [RoleController::class, 'massDelete'])->name('roles.bulkDelete');
    Route::delete('/bulk-delete/users', [UserController::class, 'massDelete'])->name('users.bulkDelete');
});

// account manager
Route::middleware(['verified'])->group(function() {
    Route::get('account/verify-new-email/{token}', [AccountController::class, 'verifyNewEmail'])->name('account.verifyNewEmail');
    Route::resource('account', AccountController::class)->only(['index', 'edit', 'update']);
});

// donors
Route::post('/donors', [DonorController::class, 'store'])->name('donors.store');

require __DIR__ . '/auth.php';
