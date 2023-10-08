<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Mail\Resetpassword;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            return redirect()->back()->with('invalid-data', 'البيانات غير صحيحه')->withInput($request->only('phone', 'remember_me'));
        }
    }

    public function resetPasswodForm()
    {
        return view('Front.reset-password');
    }

    public function resetPasswod(Request $request)
    {
        $request->validate([
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
        ]);
        $client = Client::where('phone', $request->phone)->where('active', 1)->first();
        if ($client) {
            $code = rand(100000, 999999);
            $client->update([
                'pin_code' => $code
            ]);
            Mail::to($client)->send(new Resetpassword($code));
            return redirect()->route('client.new_passwod_form', $request->phone);
        }
    }

    public function newPasswodForm($phone)
    {
        return view('Front.new-password', compact('phone'));
    }

    public function newPasswod(Request $request)
    {
        $request->validate([
            'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
            'pin_code' => "required|integer",
            'password' => "required|confirmed"
        ]);

        $client = Client::where('phone', $request->phone)->where('pin_code', $request->pin_code)->first();
        if ($client) {
            $client->update([
                'password' => bcrypt($request->password)
            ]);
            auth()->guard('front')->login($client);
            return redirect()->route('client.index');
        }
        return redirect()->back()->with('invalid-data', 'البيانات غير صحيحه');
    }


    public function logout()
    {
        auth()->guard('front')->logout();
        return redirect()->route('client.index');
    }
}