<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|unique:categories,name"
        ]);
        Category::create($request->all());
        return redirect()->back()->with('success', 'تم اضافة القسم بنجاح');
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required|unique:categories,name,$id"
        ]);
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث القسم بنجاح');
    }


    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف القسم بنجاح');
    }
}
