<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/applicant/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('applicant.dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('/study-centre/dashboard', function () {
//     return view('study-centre.dashboard');
// });

// Route::get('/study-centre/dashboard', function () {
//     return view('applicant.dashboard');
// });


// user protected routes
Route::group(['middleware' => ['auth', 'applicant'], 'prefix' => 'applicant'], function () {
    Route::get('/dashboard', function(){
        return view('applicant.dashboard');
    })->name('applicant.dashboard');

    Route::get('/application', function(){
        return view('form');
    })->name('applicant.form');


});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// study Centre protected routes
Route::group(['middleware' => ['auth', 'studyCentre'], 'prefix' => 'study-centre'], function () {
    Route::get('/dashboard', function(){
        return view('study-centre.dashboard');
    })->name('study-centre.dashboard');


});
