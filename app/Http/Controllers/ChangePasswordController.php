<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('Password.index');
    }
    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        $request->user()->update(
            [
                'password' => bcrypt($request->password)
            ]
        );
        return redirect()->back()->with('success', 'تم تغيير الباسورد بنجاح');
    }
}
