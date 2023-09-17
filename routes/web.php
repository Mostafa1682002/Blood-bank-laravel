<?php

use App\Http\Controllers\ArticaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => "auth"], function () {
    //Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //Governorate
    Route::resource('governorates', GovernorateController::class);
    //City
    Route::resource('cities', CityController::class);
    //Categories
    Route::resource('categories', CategoryController::class);
    //Articales
    Route::resource('articles', ArticaleController::class);
    //Clients
    Route::resource('clients', ClientController::class);
});
