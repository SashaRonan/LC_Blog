<?php

namespace App\Http\Controllers\Main;
namespace App\Http\Controllers\Admin\Main;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['\App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class);
});

Route::group(['\App\Http\Controllers\Admin\Main', 'prefix' => 'admin'],function () {
    Route::get('/', IndexController::class);
});

Auth::routes();
