<?php

use App\Http\Controllers\ArticaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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
})->middleware('guest');

Auth::routes(['register' => false]);

Route::group(['middleware' => ["auth", 'auto_check_premission']], function () {
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
    //Donations
    Route::resource('donations', DonationController::class);
    //Contacts
    Route::group(['prefix' => "contacts", 'controller' => ContactsController::class, 'as' => "contacts"], function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/destroy/{id}', 'destroy')->name('.destroy');
    });
    //Settings
    Route::group(['prefix' => "settings", 'controller' => SettingController::class, 'as' => "settings"], function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/update', 'update')->name('.update');
    });
    //Change Password
    Route::group(['prefix' => "password", 'controller' => ChangePasswordController::class, 'as' => "password"], function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/new-password',  'newPassword')->name('.new');
    });
    //Users
    Route::resource('users', UserController::class);
    //Roles
    Route::resource('roles', RoleController::class);
});
