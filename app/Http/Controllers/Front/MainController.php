<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonation;
use App\Http\Requests\UpdateProfile;
use App\Models\Articale;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        if (auth()->guard('front')->check()) {
            $favorites = auth()
                ->guard('front')
                ->user()
                ->articales->pluck('id')
                ->toArray();
        } else {
            $favorites = [];
        }
        $donations = DonationRequest::orderBy('id', 'desc')->paginate(5);
        $articles = Articale::orderBy('id', 'desc')->paginate(5);
        return view('Front.index', compact('donations', 'articles', 'favorites'));
    }

    public function articles()
    {
        // return view('Front.articles');
    }

    public function articleDetails($id)
    {
        $article = Articale::findOrFail($id);
        $articles = Articale::where('category_id', $article->category_id)->get();
        if (auth()->guard('front')->check()) {
            $favorites = auth()
                ->guard('front')
                ->user()
                ->articales->pluck('id')
                ->toArray();
        } else {
            $favorites = [];
        }
        return view('Front.article-details', compact('article', 'articles', 'favorites'));
    }

    public function articleToggle(Request $request, $article_id)
    {
        $request->user()->articales()->toggle($article_id);
        return redirect()->back();
    }

    public function donationRequests(Request $request)
    {
        $donations = DonationRequest::where(function ($query) use ($request) {
            if ($request->has('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })
            ->orWhere(function ($query) use ($request) {
                if ($request->has('city_id')) {
                    $query->where('city_id', $request->city_id);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('Front.donation-requests', compact('donations'));
    }

    public function createDonationRequestForm()
    {
        return view('Front.create-donation-request');
    }

    public function createDonationRequest(StoreDonation $request)
    {
        $request->user()->donationRequests()->create($request->all());
        //Latest Donation
        $donation = DonationRequest::latest()->first();
        //Clients Id
        $clients_id = $donation->city->governorate->clients()
            ->where('blood_type_id', $request->blood_type_id)->get()->pluck('id');
        if (count($clients_id)) {
            $notification = $donation->notification()->create([
                'title' => "حاله جديده",
                'content' => "مطلوب متبرع للحاله $donation->name",
            ]);
            $notification->clients()->attach($clients_id);
            //tokens
            $tokens = Token::whereIn('client_id', $clients_id)->where('token', '!=', null)->pluck('token')->toArray();
            if (count($tokens)) {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donation->id
                ];
                notifyByFirebase($title, $body, $tokens, $data);
            }
        }
        return redirect()->back()->with('success', 'نم انشاء طلب التبرع بنجاح');
    }



    public function profile()
    {
        $profile = auth('front')->user();
        return view('Front.profile', compact('profile'));
    }
    public function updateProfile(UpdateProfile $request)
    {
        $client = $request->user();
        $data = $request->all();
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $client->update($data);
        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function insideRequest($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('Front.inside-request', compact('donation'));
    }

    public function aboutUs()
    {
        return view('Front.about-us');
    }

    public function favorite()
    {
        $articles = auth()->guard('front')->user()->articales;
        return view('Front.favorite', compact('articles'));
    }

    public function contactUsForm()
    {
        return view('Front.contact-us');
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'title' => "required",
            'message' => "required"
        ]);
        $request->user()->contacts()->create($request->all());
        return redirect()->back()->with('success', 'تم الارسال بنجاح');
    }

    public function getCity($governorate_id)
    {
        $cities = City::where('governorate_id', $governorate_id)->pluck('id', 'name');
        return response()->json($cities, 200, []);
    }
}