<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('Settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
