<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

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
    return view('front.welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');



    // User routes
    Route::resource('/users', UsersController::class);
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');





});


