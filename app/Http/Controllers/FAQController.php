<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    //page 
    public function index()
    {
        $faqs = FAQ::paginate()->withQueryString();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/faq/index',['admin'=>$admin,'faqs'=>$faqs]);
    }

    //create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'question' => ['required','min:5','max:100'],
            'answer' => ['required','min:5','max:100']
        ]);

        FAQ::create($data);
        return back();
    }
    // show
    public function show($id)
    {
        $faq = FAQ::find($id);
        return Inertia::render('admin/faq/show',['faq'=>$faq]);
    }

    //update 
    public function update(Request $request)
    {
        $data = $request->validate([
            'question' => ['required','min:5','max:100'],
            'answer' => ['required','min:5','max:100']
        ]);
        FAQ::find($request->id)->update($data);
        return redirect('/admin/faqs');
    }

    // delete 
    public function delete($id)
    {
        FAQ::find($id)->delete();
        return redirect('/admin/faqs');
    }
}
