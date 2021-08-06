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
    return view('auth.login');
});

// if (!Auth::check()) {
//     Route::get('/', function () {
//         return view('auth.login');
//     });
// }

// if (Auth::check()) {


//     if ($user = Auth::user()) {

//         if ($user->type === 'admin') {

//             Route::get('/', function () {
//                 return redirect(route('applicant.dashboard'));
//             });
//         } else if ($user->type === 'rie') {
//             Route::get('/', function () {
//                 return redirect(route('study-centre.dashboard'));
//             });
//         } else if ($user->type === 'user') {
//             Route::get('/', function () {
//                 return redirect(route('applicant.dashboard'));
//             });
//         }
//     }
// }




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


// Applicant protected routes
Route::group(['middleware' => ['auth', 'applicant'], 'prefix' => 'applicant'], function () {

    Route::get('/dashboard', function () {
        return view('applicant.dashboard');
    })->name('applicant.dashboard');

    Route::get('/application/step1', function () {
        return view('applicant.application.form-step1');
    })->name('applicantion.form.step1');

    Route::POST('/application/step1', 'App\Http\Controllers\ApplicationController@store')->name('application.step1.store');

    //    Route::get('/application/step1', 'App\Http\Controllers\ApplicationController@index')->name('applicantion.form.step1');

    Route::get('/application/step2', function () {
        return view('applicant.application.form-step2');
    })->name('applicantion.form.step2');
});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/', function () {
        return redirect(route('applicant.dashboard'));
    });
});

// study Centre protected routes
Route::group(['middleware' => ['auth', 'studyCentre'], 'prefix' => 'study-centre'], function () {
    Route::get('/dashboard', function () {
        return view('study-centre.dashboard');
    })->name('study-centre.dashboard');
});