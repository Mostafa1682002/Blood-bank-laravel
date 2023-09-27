<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Exception;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = DonationRequest::paginate(20);
        return view('Donations.index', compact('donations'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('Donations.show', compact('donation'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DonationRequest::findOrFail($id)->delete();
        return redirect()->back()->with('success', "تم حذف طلب التبرع بنجاح");
    }
}
