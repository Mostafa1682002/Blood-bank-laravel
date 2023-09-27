<?php

namespace App\Http\Controllers;

use App\Models\Articale;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $articales = Articale::paginate(20);
        return view('Articles.index', compact('categories', 'articales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            'category_id' => "required|exists:categories,id",
            'image' => "required|mimes:png,jpg,jpng",
            'content' => "required"
        ]);
        $data = $request->all();
        $image_name =  uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('', $image_name, 'articales');
        $data['image'] = asset('') . "assets/images/articales/" . $image_name;
        Articale::create($data);
        return redirect()->back()->with('success', 'تم اضافة المقال بنجاح');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => "required",
            'category_id' => "required|exists:categories,id",
            'image' => "mimes:png,jpg,jpng",
            'content' => "required"
        ]);
        $data = $request->all();
        $articale = Articale::findOrFail($id);
        if ($request->hasFile('image')) {
            //Delete Old Image
            $image = $articale->image;
            unlink("./" . parse_url($image)['path']);
            //Add New Image
            $image_name = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('', $image_name, 'articales');
            $data['image'] = asset('') . "assets/images/articales/" . $image_name;
        }
        $articale->update($data);
        return redirect()->back()->with('success', 'تم تحديث المقال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articale = Articale::findOrFail($id);
        $image = $articale->image;
        unlink("./" . parse_url($image)['path']);
        $articale->delete();
        return redirect()->back()->with('success', 'تم حذف المقال بنجاح');
    }
}
