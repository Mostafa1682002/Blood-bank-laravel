<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Resetpassword;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => "required|unique:clients,email",
                'name' => "required|min:3",
                'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:clients,phone",
                'password' => "required|confirmed|min:5",
                'date_birth' => "required",
                'blood_type_id' => "required|exists:blood_types,id",
                'last_date_donation' => "required",
                'city_id' => "required|exists:cities,id",
            ]);

            if ($validator->fails()) {
                return apiResponse(401, 'falid', $validator->errors());
            }

            $request->merge(['password' => bcrypt($request->password)]);
            $client = Client::create($request->all());
            $client->api_token = Str::random(70);
            $client->save();


            $client->governorates()->attach($client->city->governorate_id);
            $client->bloodTypes()->attach($client->blood_type_id);

            return apiResponse(200, 'succes', [
                'api_token' => $client->api_token,
                'client' => $client
            ]);
        } catch (Exception $e) {
            return apiResponse(401, $e->getMessage());
        }
    }




    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
                'password' => "required",
            ]);

            if ($validator->fails()) {
                return apiResponse(401, 'fails', $validator->errors());
            }

            $client = Client::where('phone', $request->phone)->where('active', 1)->first();
            if ($client) {
                if (Hash::check($request->password, $client->password)) {
                    return apiResponse(200, 'تم تسجيل الدخول بنجاح', [
                        'api_token' => $client->api_token,
                        'client' => $client
                    ]);
                }
                return apiResponse(401, 'البيانات غير صحيحه');
            } else {
                return apiResponse(401, 'البيانات غير صحيحه');
            }
        } catch (Exception $e) {
            return apiResponse(401, $e->getMessage());
        }
    }





    public function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => "required|regex:/01[0-2,5]{1}[0-9]{8}$/",
            ]);
            if ($validator->fails()) {
                return apiResponse(401, $validator->errors());
            }
            $client = Client::where('phone', $request->phone)->first();


            if ($client) {
                $code = rand(100000, 999999);
                $client->update([
                    'pin_code' => $code,
                ]);
                Mail::to($client)->send(new Resetpassword($code));
                return apiResponse(201, 'تم ارسال رساله بنجاح');
            } else {
                return apiResponse(400, 'البيانات غير صحيحه');
            }
        } catch (Exception $e) {
            return apiResponse(401, $e->getMessage());
        }
    }





    public function newPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pin_code' => "required|integer",
                "new_password" => "required|confirmed",
            ]);
            if ($validator->fails()) {
                return apiResponse(401, $validator->errors());
            }

            $client = Client::where('pin_code', $request->pin_code)->first();

            if ($client) {
                $client->password = bcrypt($request->new_password);
                $client->save();
                return apiResponse(201, 'تم استعادة كلمة المرور بنجاح');
            }

            return apiResponse(401, 'الكود غير صحيح');
        } catch (Exception $e) {
            return apiResponse(401, $e->getMessage());
        }
    }




    public function registerToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => "required",
            'type' => "required|in:ios,android"
        ]);

        if ($validator->fails()) {
            return apiResponse(401, $validator->errors());
        }

        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return apiResponse(201, 'تم التسجيل بنجاح');
    }

    public function removeToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => "required",
        ]);

        if ($validator->fails()) {
            return apiResponse(401, $validator->errors());
        }
        Token::where('token', $request->token)->delete();
        return apiResponse(201, 'تم الحذف بنجاح');
    }
}
