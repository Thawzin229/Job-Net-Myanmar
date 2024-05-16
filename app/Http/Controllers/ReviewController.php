<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //page
    public function index()
    {
        return Inertia::render('user/review/index');
    }
    //create 
    public function create(Request $request)
    {
        $data =  $request->validate([
            'review' => ['required','string','max:200'],
        ]);

        $data['user_id'] = Auth::id();

        Review::create($data);

        return back()->withErrors(['status' => 'Review sent successfully.']);
    }
}
