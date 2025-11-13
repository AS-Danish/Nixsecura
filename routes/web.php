<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ReviewController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $popularCourses = Course::latest()->take(3)->get();
    $totalCourses = Course::count();
    return view('welcome', compact('popularCourses', 'totalCourses'));
});

// Public course details (read-only)
Route::get('/courses/{course}/view', [CourseController::class, 'publicShow'])->name('courses.view');

// Public all courses listing
Route::get('/courses/all', [CourseController::class, 'publicIndex'])->name('courses.public.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Course routes
    Route::resource('courses', CourseController::class);

    // Blog routes
    Route::resource('blogs', BlogController::class);

    // Certificate routes
    Route::resource('certificates', CertificateController::class);

    // Gallery routes
    Route::resource('galleries', GalleryController::class);

    // Workshop routes
    Route::resource('workshops', WorkshopController::class);

    // Review routes
    Route::resource('reviews', ReviewController::class);
});

require __DIR__.'/auth.php';
