<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserController;

/*
|------------------------------------------
| Admin Root
|------------------------------------------
*/
Route::get('/', function () {

    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('admin.login');

})->name('admin.home');


/*
|------------------------------------------
| Guest Admin
|------------------------------------------
*/
Route::middleware('guest:admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'create'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'store'])
        ->name('admin.login.store');
});


/*
|------------------------------------------
| Auth Admin
|------------------------------------------
*/
Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::post('/users/{id}/update', [UserController::class, 'update'])
        ->name('admin.users.update');

    Route::post('/users/{id}/courses', [UserController::class, 'updateCourses'])
        ->name('admin.users.courses.update');

    Route::post('/users/{id}/delete', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    Route::get('/courses', [CourseController::class, 'index'])
        ->name('admin.courses');

    Route::get('/courses/create', [CourseController::class, 'create'])
        ->name('admin.courses.create');

    Route::post('/courses/store', [CourseController::class, 'store'])
        ->name('admin.courses.store');

    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])
        ->name('admin.courses.edit');

    Route::post('/courses/{id}/update', [CourseController::class, 'update'])
        ->name('admin.courses.update');

    Route::post('/courses/{id}/delete', [CourseController::class, 'destroy'])
        ->name('admin.courses.destroy');

    Route::post('/logout', [AdminAuthController::class, 'destroy'])
        ->name('admin.logout');
});
