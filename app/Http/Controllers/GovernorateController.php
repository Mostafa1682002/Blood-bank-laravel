<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::paginate(20);
        return view('Governorates.index', compact('governorates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|unique:governorates,name"
        ]);
        Governorate::create($request->all());
        return redirect()->back()->with('success', 'تم اضافة المحافظه بنجاح');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|unique:governorates,name,$id"
        ]);
        $governorate = Governorate::findOrFail($id);
        $governorate->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث المحافظه بنجاح');
    }


    public function destroy($id)
    {
        Governorate::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف المحافظه بنجاح');
    }
}
