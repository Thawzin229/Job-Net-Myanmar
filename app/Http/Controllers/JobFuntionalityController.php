<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\JobFuntionality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobFuntionalityController extends Controller
{
    //page 
    public function index()
    {
        $search = request('search');
        $datas = JobFuntionality::FetchData($search)
            ->latest()->paginate(10)->withQueryString();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/job-functions/index', ['admin' => $admin, 'datas' => $datas]);
    }

    //create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);
        JobFuntionality::create($data);
        return redirect('admin/job-functions');
    }

    // edit page 
    public function edit($id)
    {
        $data = JobFuntionality::find($id);
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/job-functions/show', ['job' => $data, 'admin' => $admin]);
    }

    //update 
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|string',
        ]);

        JobFuntionality::where('id', $request->id)->update($data);
        return redirect('admin/job-functions');
    }

    //delete 
    public function delete($id)
    {
        JobFuntionality::find($id)->delete();
        return redirect('admin/job-functions');
    }
}
