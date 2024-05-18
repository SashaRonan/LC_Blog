<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\MainController;
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


Route::get('/', [MainController::class, 'index']);

Route::prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::name('admin')->resource('categories', CategoryController::class);
        Route::name('admin')->resource('tags', TagController::class);
        Route::name('admin')->resource('posts', PostController::class);
    });



Auth::routes();
