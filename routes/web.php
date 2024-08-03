<?php

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

Route::get('admin/dashboard',[EmployeeController::class,'index'])->middleware(['auth','admin'])->name('admin/dashboard.view');
Route::get('/task_01', [EmployeeController::class, 'create'])->name('task_01.create');
Route::post('/task_01', [EmployeeController::class, 'store'])->name('task_01.store');
// Route::get('/tasks', [EmployeeController::class, 'show'])->name('tasks.index');
// Route::get('/tasks/{id}/edit', [EmployeeController::class, 'edit'])->name('tasks.edit');
// Route::patch('/tasks/{id}', [EmployeeController::class, 'update'])->name('tasks.update');
// Route::delete('/tasks/{id}', [EmployeeController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks', [EmployeeController::class, 'show'])->name('tasks.index');
Route::get('/tasks/{id}/edit', [EmployeeController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{id}', [EmployeeController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [EmployeeController::class, 'destroy'])->name('tasks.destroy');

Route::get('auth/register-admin',[EmployeeController::class,'regadmin']);

