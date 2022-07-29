<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->group(function(){
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@login');

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('signup', 'App\Http\Controllers\Admin\LoginController@signup');
        Route::post('logout', 'App\Http\Controllers\Admin\LoginController@logout');
        Route::get('user-profile/{id}', 'App\Http\Controllers\Admin\LoginController@userProfile');

        Route::prefix('menu')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\MenuController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\MenuController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\MenuController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\MenuController@delete');
        });

        Route::prefix('sub-menu')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\SubMenuController@index');
            Route::get('/menu/{url}', 'App\Http\Controllers\Admin\SubMenuController@menusubmenu');
            Route::post('/add', 'App\Http\Controllers\Admin\SubMenuController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\SubMenuController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\SubMenuController@delete');
        });

        Route::prefix('option-menu')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\OptionMenuController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\OptionMenuController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\OptionMenuController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\OptionMenuController@delete');
        });

        Route::prefix('medicine')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\MedicineController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\MedicineController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\MedicineController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\MedicineController@delete');
        });

        Route::prefix('visit-rate')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\VisitRateController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\VisitRateController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\VisitRateController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\VisitRateController@delete');
        });

        Route::prefix('patient')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\PatientController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\PatientController@store');
            Route::get('/find/{id}', 'App\Http\Controllers\Admin\PatientController@find');
            Route::put('/edit/{id}', 'App\Http\Controllers\Admin\PatientController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\PatientController@delete');
        });

        Route::prefix('consultation-fee')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\ConsultationFeeController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\ConsultationFeeController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\ConsultationFeeController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\ConsultationFeeController@delete');
        });

        Route::prefix('visit')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\VisitController@index');
            Route::get('/patient-visits/{id}', 'App\Http\Controllers\Admin\VisitController@list');
            Route::post('/add', 'App\Http\Controllers\Admin\VisitController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\VisitController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\VisitController@delete');
        });

        Route::prefix('consultation')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\ConsultationController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\ConsultationController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\ConsultationController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\ConsultationController@delete');
        });

        Route::prefix('prescription')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\PrescriptionController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\PrescriptionController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\PrescriptionController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\PrescriptionController@delete');
        });

        Route::prefix('billing')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\BillingController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\BillingController@store');
            Route::post('/edit/{id}', 'App\Http\Controllers\Admin\BillingController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\BillingController@delete');
        });

    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
