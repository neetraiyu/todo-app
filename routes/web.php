<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [EmployeeController::class, 'index'])->name('admin.dashboard.view');
    Route::get('/task_01', [EmployeeController::class, 'create'])->name('task_01.create');
    Route::post('/task_01', [EmployeeController::class, 'store'])->name('task_01.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [EmployeeController::class, 'show'])->name('tasks.index');
    Route::get('/tasks/{id}/edit', [EmployeeController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/{id}', [EmployeeController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [EmployeeController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/tasks/accept/{id}', [EmployeeController::class, 'accept'])->name('tasks.accept');
    Route::post('/tasks/reject/{id}', [EmployeeController::class, 'reject'])->name('tasks.reject');
});

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('register-admin', [RegisteredUserController::class, 'createAdmin'])->name('register-admin');
Route::post('register-admin', [RegisteredUserController::class, 'storeAdmin']);

Route::post('/tasks/complete/{id}', [EmployeeController::class, 'complete'])->name('tasks.complete');
// Route::post('/tasks/{id}/dismiss', [EmployeeController::class, 'dismiss'])->name('tasks.dismiss');

