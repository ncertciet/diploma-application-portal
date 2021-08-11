<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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

Route::get('/', 'App\Http\Controllers\HomeController@index');

// if (!Auth::check()) {
//     Route::get('/', function () {
//         return view('auth.login');
//     });
// }



Route::group(['middleware' => ['auth',], 'prefix' => 'account'], function () {
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('account.profile');
    Route::POST('/profile', 'App\Http\Controllers\UserController@profileUpdate')->name('account.update');
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


// Applicant protected routes
Route::group(['middleware' => ['auth', 'applicant'], 'prefix' => 'applicant'], function () {

    Route::get('/dashboard', function () {
        return view('applicant.dashboard');
    })->name('applicant.dashboard');

//    Route::get('/application/step1', function () {
//        return view('applicant.application.form-step1');
//    })->name('applicantion.form.step1');

    Route::get('/application/step1', 'App\Http\Controllers\ApplicationController@index')->name('application.form.step1');
    Route::POST('/application/step1', 'App\Http\Controllers\ApplicationController@store')->name('application.step1.store');
    

    Route::get('/application/step2', function () {
        return view('applicant.application.form-step2');
    })->name('application.form.step2');

    Route::POST('/application/step2', 'App\Http\Controllers\ApplicationController@step2')->name('application.step2.store');



    // Route::get('/application/step2', function () {
    //     return view('applicant.application.form-step2');
    // })->name('application.form.step2');

    Route::get('/application/step3', function () {
        return view('applicant.application.form-step3');
    })->name('application.form.step3');

    Route::POST('/application/step3', 'App\Http\Controllers\ApplicationController@step3')->name('application.step3.store');


    Route::get('/application/step4', function () {
        return view('applicant.application.form-step4');
    })->name('application.form.step4');

    Route::POST('/application/step4', 'App\Http\Controllers\ApplicationController@step4')->name('application.step4.store');

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
