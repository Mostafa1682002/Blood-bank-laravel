<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:front')->except('logout');
    }


    public function createAccountForm()
    {
        return view('Front.create-account');
    }

    public function register(StoreClient $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(70);
        $client->save();
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        auth()->guard('front')->login($client);
        return redirect()->route('client.index');
    }

    public function loginForm()
    {
        return view('Front.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
            'password' => "required",
        ]);
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('front')->attempt($request->only('phone', 'password'), $remember_me)) {
            return redirect()->route('client.index');
        } else {
            return redirect()->back()->with('invalid-data', 'البيانات غير صحيحه')->withInput($request->only('phone'));
        }
    }


    public function logout()
    {
        auth()->guard('front')->logout();
        return redirect()->route('client.index');
    }
}
