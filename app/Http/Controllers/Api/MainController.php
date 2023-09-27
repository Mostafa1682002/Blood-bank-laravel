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
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function getProfile(Request $request)
    {
        return apiResponse(200, 'sucees', $request->user());
    }

    //Update Profile
    public function updateProfile(Request $request)
    {
        $client = $request->user();
        $validator = Validator::make($request->all(), [
            'email' => "required|unique:clients,email," . $client->id,
            'name' => "required|min:3",
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:clients,email," .  $client->id,
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
        }
        $client->update($request->except('password_confirmation'));
        return apiResponse(200, 'تم تحديث البيانات بنجاح', $client);
    }

    //Notifications Settings
    public function dataNotificationSettings(Request $request)
    {
        $client = $request->user();
        $governorates = $client->governorates;
        $bloodTypes = $client->bloodTypes;
        return apiResponse(200, 'success', [
            'governorates' => $governorates,
            'bloodTypes' => $bloodTypes,
        ]);
    }

    public function updateNotificationSettings(Request $request)
    {
        $client = $request->user();
        $validator = Validator::make($request->all(), [
            'blood_types_id' => "required|exists:blood_types,id",
            "governorates_id" => "required|exists:governorates,id"
        ]);
        if ($validator->fails()) {
            return apiResponse(401, 'failed', $validator->errors());
        }
        $client->governorates()->sync($request->governorates_id);
        $client->bloodTypes()->sync($request->blood_types_id);
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
        $settings = Setting::first();
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
        $request->user()->contacts()->create($request->all());
        return apiResponse(200, 'تم ارسال الرساله لنجاح');
    }


    //Articales
    public function articles(Request $request)
    {
        $articales = Articale::where(function ($query) use ($request) {
            //single res. move single post to a new method
            if ($request->has('id')) {
                $query->where('id', $request->id);
            }
        })
            //filter by category
            ->OrWhere(function ($query) use ($request) {
                if ($request->has('category_id')) {
                    $query->where('category_id', 'like', $request->category_id);
                }
            })
            // filter by keyword
            ->OrWhere(function ($query) use ($request) {
                if ($request->has('keyword')) {
                    $query->where('title', 'like', $request->keyword);
                }
            })
            ->paginate(10);
        return apiResponse(200, 'succes', $articales);
    }


    //ListFavorites
    public function listFavourites(Request $request)
    {
        $posts = $request->user()->articales()->paginate();
        return apiResponse(200, 'success', $posts);
    }


    //Toggle Requests
    public function toggleFavourite(Request $request)
    {
        $client = $request->user();
        $client->articales()->toggle($request->articale_id);
        return apiResponse(200, 'success');
    }


    //Donation Requests
    public function createDonationRequest(Request $request)
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
        // client->relation->create()
        // $request->merge(['client_id' => auth()->guard('api')->user()->id]);
        // $donation = DonationRequest::create($request->all());
        $request->user()->donationRequests()->create($request->all());
        //Latest Donation
        $donation = DonationRequest::latest()->first();
        //Clients Id
        $clients_id = $donation->city->governorate->clients()
            ->where('blood_type_id', $request->blood_type_id)->get()->pluck('id');
        if (count($clients_id)) {
            // Add Notification
            // $notification = Notification::create([
            //     'title' => "حاله جديده",
            //     'content' => "ننننننننننننن",
            //     'donation_request_id' => $donation->id
            // ]);
            $notification = $donation->notification()->create([
                'title' => "حاله جديده",
                'content' => "مطلوب متبرع للحاله $donation->name",
            ]);
            $notification->clients()->attach($clients_id);

            //tokens
            $tokens = Token::whereIn('client_id', $clients_id)->where('token', '!=', null)->pluck('token')->toArray();
            if (count($tokens)) {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donation->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
            }
        }

        return apiResponse(200, 'تم انشاء طلب التبرع', ['donation' => $donation, 'send' => $send]);
    }


    //Get Donation Requests
    public function getDonationRequests(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
            if ($request->has('donation_id')) {
                $query->where('id', $request->donation_id);
            }
        })
            // filter by blood_type_id
            ->OrWhere(function ($query) use ($request) {
                if ($request->has('blood_type_id')) {
                    $query->where('blood_type_id', 'like', $request->blood_type_id);
                }
            })
            //Filter By City
            ->OrWhere(function ($query) use ($request) {
                if ($request->has('city_id')) {
                    $query->where('city_id', $request->city_id);
                }
            })
            ->paginate();
        return apiResponse(200, "success", $donations);
    }
}
