<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    //page 
    public function index()
    {
        $search = request('search');
        $datas = Location::FetchData($search)
            ->latest()->paginate(10)->withQueryString();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/locations/index', ['admin' => $admin, 'datas' => $datas]);
    }

    //create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);
        Location::create($data);
        return redirect('admin/locations');
    }

    // edit page 
    public function edit($id)
    {
        $data = Location::find($id);
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/locations/show', ['location' => $data, 'admin' => $admin]);
    }

    //update 
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|string',
        ]);

        Location::where('id', $request->id)->update($data);
        return redirect('admin/locations');
    }

    //delete 
    public function delete($id)
    {
        Location::find($id)->delete();
        return redirect('admin/locations');
    }
}
