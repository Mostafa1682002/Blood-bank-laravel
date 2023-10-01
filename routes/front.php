<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Route;




Route::group(['prefix' => "client", 'as' => 'client'], function () {
    //Create Account
    Route::get('/create-account', [AuthController::class, 'createAccountForm'])->name('.create_account');
    Route::post('/register', [AuthController::class, 'register'])->name('.register');
    //Login
    Route::get('/login-form', [AuthController::class, 'loginForm'])->name('.login_form');
    Route::post('/login', [AuthController::class, 'login'])->name('.login');
    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('.logout');
    //Home
    Route::get('/home', [MainController::class, 'index'])->name('.index');
    //Articles
    Route::get('/articles', [MainController::class, 'articles'])->name('.articles');
    Route::get('/article-details/{id}', [MainController::class, 'articleDetails'])->name('.article_details');
    //Donation Requests
    Route::get('/donation-requests', [MainController::class, 'donationRequests'])->name('.donation_requests');
    Route::get('/inside-request/{id}', [MainController::class, 'insideRequest'])->name('.inside_request');
    //Get Cities By Govenorate Id
    Route::get('/get-cities/{id}', [MainController::class, 'getCity'])->name('.get_cities');
    //About Us
    Route::get('/about-us', [MainController::class, 'aboutUs'])->name('.about_us');
    //Who Are Us
    Route::get('/contact-us', [MainController::class, 'contactUsForm'])->name('.contact_us_form');


    Route::group(['middleware' => "auth:front"], function () {
        Route::get('/create-donation-request', [MainController::class, 'createDonationRequestForm'])->name('.create_donation_request_form');
        Route::post('/create-donation-request', [MainController::class, 'createDonationRequest'])->name('.create_donation_request');
        Route::get('/article-toggle/{article_id}', [MainController::class, 'articleToggle'])->name('.article_toggle');
    });
});
