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

        Route::prefix('menu')->group(function(){
            Route::get('/', 'App\Http\Controllers\Admin\MenuController@index');
            Route::post('/add', 'App\Http\Controllers\Admin\MenuController@store');
            Route::post('/edit', 'App\Http\Controllers\Admin\MenuController@update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Admin\MenuController@delete');
        });

    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
