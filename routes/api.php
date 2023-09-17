<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => "v1"], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::post('new-password', [AuthController::class, 'newPassword']);

    Route::get('governorates', [MainController::class, 'governorates']);
    Route::get('cities', [MainController::class, 'cities']);
    Route::get('blood-types', [MainController::class, 'bloodTypes']);

    Route::group(['middleware' => "auth:api"], function () {
        //Articales
        Route::get('articles', [MainController::class, 'articles']);
        //Profile
        Route::get('profile', [MainController::class, 'getProfile']);
        Route::post('update-profile', [MainController::class, 'updateProfile']);
        // Notification Settings
        Route::get('notification-settings', [MainController::class, 'dataNotificationSettings']);
        Route::post('update-notification-settings', [MainController::class, 'updateNotificationSettings']);
        //Contact
        Route::post('contact', [MainController::class, 'contact']);
        //Categories
        Route::get('categories', [MainController::class, 'categories']);
        //settings
        Route::get('settings', [MainController::class, 'settings']);
        // List favourites
        Route::get('list-favourites', [MainController::class, 'listFavourites']);
        //Toggle favourite
        Route::post('toggle-favourite', [MainController::class, 'toggleFavourite']);
        //Donation Request
        Route::get('donation-requests', [MainController::class, 'getDonationRequests']);
        Route::post('create-donation-request', [MainController::class, 'createDonationRequest']);
    });
});
