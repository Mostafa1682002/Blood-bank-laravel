<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articale;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function getProfile()
    {
        return apiResponse(200, 'sucees', auth()->guard('api')->user());
    }

    //Update Profile
    public function profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|unique:clients,email," . auth()->guard('api')->user()->id,
            'name' => "required|min:3",
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:clients,email," . auth()->guard('api')->user()->id,
            'password' => "confirmed|min:5",
            'date_birth' => "required",
            'blood_type_id' => "required|exists:blood_types,id",
            'last_date_donation' => "required",
            'city_id' => "required|exists:cities,id",
        ]);

        if ($validator->fails()) {
            return apiResponse(400, 'falid', $validator->errors());
        }


        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
            Client::where('phone', $request->phone)->update($request->except('password_confirmation'));
        } else {
            Client::where('phone', $request->phone)->update($request->except('password', 'password_confirmation'));
        }

        return apiResponse(200, 'تم تحديث البيانات بنجاح', auth()->guard('api')->user());
    }

    //Notifications Settings
    public function dataNotificationSettings()
    {
        $client = Client::find(auth()->guard('api')->user()->id);
        $governorates = $client->governorates;
        $bloodTypes = $client->bloodTypes;
        return apiResponse(200, 'success', [
            'governorates' => $governorates,
            'bloodTypes' => $bloodTypes,
        ]);
    }

    public function notificationSettings(Request $request)
    {
        $client = Client::find(auth()->guard('api')->user()->id);
        $validator = Validator::make($request->all(), [
            'blood_types_id' => "required|exists:blood_types,id",
            "governorates_id" => "required|exists:governorates,id"
        ]);
        if ($validator->fails()) {
            return apiResponse(401, 'failed', $validator->errors());
        }
        $client->governorates()->syncWithoutDetaching($request->governorates_id);
        $client->bloodTypes()->syncWithoutDetaching($request->blood_types_id);
        return apiResponse(200, 'تم تحديث البيانات');
    }

    //Governorates
    public function governorates()
    {
        $governorates = Governorate::get();
        return apiResponse(200, 'success', $governorates);
    }

    //Cities
    public function cities()
    {
        $cities = City::with('governorate')->get();
        return apiResponse(200, 'success', $cities);
    }

    //BloodTypes
    public function bloodTypes()
    {
        $bloodTypes = BloodType::get();
        return apiResponse(200, 'success', $bloodTypes);
    }

    //Categories
    public function categories()
    {
        $categories = Category::get();
        return apiResponse(200, 'success', $categories);
    }

    //Settings
    public function settings()
    {
        $settings = Setting::get();
        return apiResponse(200, 'success', $settings);
    }


    //Contact
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => "required",
            'message' => "required"
        ]);
        if ($validator->fails()) {
            return apiResponse(401, $validator->errors());
        }
        $request->merge(['client_id' => auth()->guard('api')->user()->id]);
        Contact::create($request->all());
        return apiResponse(200, 'تم ارسال الرساله لنجاح');
    }


    //Articales
    public function articales(Request $request)
    {
        $articales = Articale::where(function ($query) use ($request) {
            if ($request->has('id')) {
                $query->where('id', $request->id);
            }
        })->get();
        return apiResponse(200, 'succes', $articales);
    }


    //ListFavorites
    public function listFavourites()
    {
        $client = Client::find(auth()->guard('api')->user()->id);
        $list = $client->articales;
        return apiResponse(200, 'success', $list);
    }


    //Toggle Requests
    public function toggleFavourite(Request $request)
    {
        $client = Client::find(auth()->guard('api')->user()->id);
        $client->articales()->toggle($request->articale_id);
        return apiResponse(200, 'success');
    }


    //Donation Requests
    public function donationRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'age' => "required|integer",
            'blood_type_id' => "required|exists:blood_types,id",
            'num_bags' => "required|integer",
            'hospital' => "required",
            'address_hospital' => "required",
            'city_id' => "required|exists:cities,id",
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
            'latitude' => "required",
            'longitude' => "required",
        ]);
        if ($validator->fails()) {
            return apiResponse(401, 'failed', $validator->errors());
        }

        $request->merge(['client_id' => auth()->guard('api')->user()->id]);
        $donation = DonationRequest::create($request->all());
        return apiResponse(200, 'تم انشاء طلب التبرع', $donation);
    }


    //Get Donation Requests
    public function getDonationRequests(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
            if ($request->has('donation_id')) {
                $query->where('id', $request->donation_id);
            }
        })->get();
        return apiResponse(200, "success", $donations);
    }
}
