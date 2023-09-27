<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $governorates = Governorate::all();
        $cities = City::paginate(20);
        return view('Cities.index', compact('governorates', 'cities'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'governorate_id' => "required|exists:governorates,id"
        ]);
        City::create($request->all());
        return redirect()->back()->with('success', 'تم اضافة المدينه بنجاح');
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => "required",
            'governorate_id' => "required|exists:governorates,id"
        ]);
        $city = City::findOrFail($id)->delete();
        $city->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث المدينه بنجاح');
    }

    public function destroy(string $id)
    {
        City::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف المدينه بنجاح');
    }
}
