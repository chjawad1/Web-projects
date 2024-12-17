<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

// Home route
Route::get('/', [HomeController::class, 'index']);

// Lost item reporting
Route::get('/report-lost', [ItemController::class, 'createLost']);
Route::post('/report-lost', [ItemController::class, 'storeLost']);

// Found item reporting routes
Route::get('/report-found', [ItemController::class, 'createFound'])->name('items.createFound');
Route::post('/report-found', [ItemController::class, 'storeFound'])->name('items.storeFound');


// View items route
Route::get('/items', [ItemController::class, 'index'])->name('items.index');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/items', [AdminController::class, 'items'])->name('admin.items');
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    // Display Manage Items Page
    Route::get('/admin/manage-items', [AdminController::class, 'manageItems'])->name('admin.manage-items');
    // Delete Item
    Route::delete('/admin/items/{id}', [AdminController::class, 'deleteItem'])->name('admin.items.delete');

    // Edit Item (Form Display)
    Route::get('/admin/items/{item}/edit', [AdminController::class, 'editItem'])->name('admin.items.edit');

    // Update Item (Submit Edit)
    Route::put('/admin/items/{item}', [AdminController::class, 'updateItem'])->name('admin.items.update');
    
    Route::post('/admin/items/{item}/resolve', [AdminController::class, 'resolveItem'])->name('admin.items.resolve');
    Route::delete('/admin/items/{item}', [AdminController::class, 'deleteItem'])->name('admin.items.delete');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');

    Route::post('/admin/items/{item}/approve', [AdminController::class, 'approveItem'])->name('admin.items.approve');

    // Admin route to display Add Item form
Route::get('/admin/items/create', [AdminController::class, 'createItem'])->name('admin.items.create');

// Admin route to store the new item
Route::post('/admin/items', [AdminController::class, 'storeItem'])->name('admin.items.store');


    
});



// Authentication routes
Route::get('admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Authentication-related routes
require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\RegisterController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure the 'dashboard' view exists in resources/views
})->name('dashboard');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


