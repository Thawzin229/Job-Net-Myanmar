<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\ImageUploading;
use App\Models\Campany;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class EmployerController extends Controller
{
    //page 
    public function index()
    {

        $search = request('search');
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $campanies = Campany::get(['name','id'])->toArray();
        $datas = Employer::FetchData($search)
            ->latest()->paginate(9)->withQueryString();

        return Inertia::render('admin/employers/index', [
            "admin" => $admin,
            "datas" => $datas,
            "campanies" => $campanies,
        ]);
    }

    // create category 
    public function create(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = $request->validate([
            'name' => "required|string|min:2|max:40",
            'career' => "required|string|min:2|max:40",
            'campany_id' => "required|numeric",
            'image' => 'required|file|image|max:2000',
        ]);

        $file_name = $imageuploading->upload($request, $id = null, "employer_images", Employer::class);
        $data['image'] = $file_name;
        $employer = Employer::create($data);


        return redirect('admin/employers');

    }

    public function edit($id)
    {
        $employer = Employer::select('employers.*')
        ->addSelect(['campany' => Campany::select('name')->whereColumn('id','employers.campany_id')->take(1)])
        ->where('id',$id)->first();
        $campanies = Campany::get(['name','id'])->toArray();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/employers/show', ['campanies' => $campanies, 'admin' => $admin,'employer'=>$employer]);
    }

    // update 
    public function update(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = $request->validate([
            'name' => "required|string|min:2|max:40",
            'career' => "required|string|min:2|max:40",
            'role' => 'required|string',
            'campany_id' => "required|numeric",
        ]);

        //for main campany image
        $file_name = $imageuploading->upload($request, $request->id, "employer_images", Employer::class);
        $data['image'] = $file_name;
        Employer::find($request->id)->update($data);

        return redirect('admin/employers/');

    }

    //delete 
    public function delete($id)
    {
        $old_img = Employer::find($id)->image;
        Storage::delete('employer_images/' . $old_img);
        Employer::find($id)->delete();
        return redirect('admin/employers');
    }
}
