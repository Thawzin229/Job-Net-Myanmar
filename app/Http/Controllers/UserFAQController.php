<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserFAQController extends Controller
{
    //page 
    public function index()
    {
        $faqs = FAQ::get()->toArray();
        return Inertia::render('user/faqs/index',['faqs' => $faqs]);
    }
}
