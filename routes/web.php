<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ReviewController;
use App\Models\Course;
use App\Models\Certificate;
use App\Models\Workshop;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $popularCourses = Course::latest()->take(3)->get();
    $popularCertificates = Certificate::latest()->take(3)->get();
    $totalCourses = Course::count();
    $latestWorkshops = Workshop::latest()->take(3)->get();
    $totalWorkshops = Workshop::count();
    $latestGalleries = Gallery::latest()->take(8)->get();
    $totalGalleries = Gallery::count();
    return view('welcome', compact('popularCourses', 'popularCertificates', 'totalCourses', 'latestWorkshops', 'totalWorkshops', 'latestGalleries', 'totalGalleries'));
});

// Public course details (read-only)
Route::get('/courses/{course}/view', [CourseController::class, 'publicShow'])->name('courses.view');

// Public all courses listing
Route::get('/courses/all', [CourseController::class, 'publicIndex'])->name('courses.public.index');

// Public certificates listing and details
Route::get('/certificates/all', [CertificateController::class, 'publicIndex'])->name('certificates.public.index');
Route::get('/certificates/{certificate}/view', [CertificateController::class, 'publicShow'])->name('certificates.view');
// Add this line with your other public certificate routes
Route::get('/certificates/{certificate}/json', [CertificateController::class, 'publicShowJson'])->name('certificates.json');

// Public workshops listing and details
Route::get('/workshops/all', [WorkshopController::class, 'publicIndex'])->name('workshops.public.index');
Route::get('/workshops/{workshop}/view', [WorkshopController::class, 'publicShow'])->name('workshops.view');

// Public galleries listing
Route::get('/galleries/all', [GalleryController::class, 'publicIndex'])->name('galleries.public.index');

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
