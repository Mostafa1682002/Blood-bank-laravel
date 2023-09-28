<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('Front.index');
    }

    public function getCity($governorate_id)
    {
        $cities = City::where('governorate_id', $governorate_id)->pluck('id', 'name');
        return response()->json($cities, 200, []);
    }

    public function donationRequests()
    {
        return view('Front.donation-requests');
    }
    public function createDonationRequest()
    {
        return view('Front.create-donation-request');
    }

    public function aboutUs()
    {
        return view('Front.about-us');
    }
    public function contactUs()
    {
        return view('Front.contact-us');
    }
    public function insideRequest()
    {
        return view('Front.inside-request');
    }
}
