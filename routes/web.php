<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Default routes
Route::view('/default', 'about')->name('about');
Route::view('/default-auth', 'about')->middleware(['auth', 'verified'])->name('about');
Route::view('/contact', 'contact')->middleware(['auth', 'admin'])->name('contact');
Route::view('/about', 'about')->middleware(['auth', 'admin'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User login related
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::redirect('admin/', '/admin/companies')->name('admin.dashboard');
    Route::view('/', 'admin.index')->name('admin.dashboard');
    Route::view('/companies', 'admin.companies')->name('admin.companies');
    Route::view('/courses', 'admin.courses')->name('admin.courses');
    Route::view('/laptops', 'admin.laptops')->name('admin.laptops');
    Route::view('/users', 'admin.users')->name('admin.users');
});

// Laptop routes
Route::prefix('laptop')->group(function (): void {
    // Route::get('/{course_id}', [LaptopController::class, 'index'])->middleware(['auth', 'verified'])->name('laptop.index');
    // Route::view('/', 'laptop.index')->name('laptop.index'); 

    Route::get('/laptop/details/{laptop_id}', [LaptopController::class, 'details'])->name('laptop.details');

    Route::get('/laptop', [LaptopController::class, 'edit'])->name('laptop.edit');
    Route::patch('/profile', [LaptopController::class, 'update'])->name('laptop.update');
    Route::delete('/profile', [LaptopController::class, 'destroy'])->name('laptop.destroy');
});

// Course routes
Route::prefix('course')->group(function (): void {
    Route::get('/', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('course.index');
    Route::get('/laptop/{course_id}', [LaptopController::class, 'index'])->middleware(['auth', 'verified'])->name('course.laptop');

    // Route::get('/laptop', [CourseController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [CourseController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [CourseController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
