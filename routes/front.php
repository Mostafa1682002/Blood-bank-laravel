<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => "client", 'as' => 'client'], function () {
    //Create Account
    Route::get('/create-account', [AuthController::class, 'createAccountForm'])->name('.create_account');
    //Login
    Route::get('/login', [AuthController::class, 'loginForm'])->name('.login');
    //Get Cities By Govenorate Id
    Route::get('/get-cities/{id}', [MainController::class, 'getCity'])->name('.get_cities');
    //Home
    Route::get('/home', [MainController::class, 'index'])->name('.index');
    //Donation Requests
    Route::get('/donation-requests', [MainController::class, 'donationRequests'])->name('.donation_requests');
    Route::get('/create-donation-request', [MainController::class, 'createDonationRequest'])->name('.create_donation_request');
    //Inside Request
    Route::get('/inside-request', [MainController::class, 'insideRequest'])->name('.inside_request');
    //About Us
    Route::get('/about-us', [MainController::class, 'aboutUs'])->name('.about_us');
    //Who Are Us
    Route::get('/contact-us', [MainController::class, 'contactUs'])->name('.contact_us');
});
