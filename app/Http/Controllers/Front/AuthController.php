<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createAccountForm()
    {
        return view('Front.create-account');
    }

    public function loginForm()
    {
        return view('Front.login');
    }
}
