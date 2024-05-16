<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\ImageUploading;
use App\Models\Campany;
use App\Models\CampanyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampanyController extends Controller
{
    //page 
    public function index()
    {

        $search = request('search');
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $datas = Campany::FetchData($search)
            ->latest()->paginate(10)->withQueryString();

        return Inertia::render('admin/campanies/index', [
            "admin" => $admin,
            "datas" => $datas,
        ]);
    }

    // create category 
    public function create(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = $request->validate([
            'name' => "required|string|min:2|max:40",
            'type' => "required|string|min:2|max:40",
            'employee' => "required|string|min:2|max:40",
            'image' => 'required|file|image|max:2000',
            'statement' => "required|string|max:2000",
            'visions' => "required|string|max:2000",
            'what_we_do' => "required|string|max:2000",
            'why_you_should_us' => "required|string|max:2000",
            'address' => "required|string|max:2000",
        ]);

        $file_name = $imageuploading->upload($request, $id = null, "campany_images",Campany::class);
        $data['image'] = $file_name;
        $campany = Campany::create($data);

        if($request->has('gallery'))
        {
        foreach ($request->gallery as $img) {
            $file_name = uniqid().$img->getClientOriginalName();
            $img->storeAs('campany_gallery',$file_name);
            CampanyImage::create([
                'campany_id' => $campany->id,
                'image' => $file_name
            ]);
        }
    }

        return redirect('admin/campanies');

    }

    //edit 
    public function detail($id)
    {
        $campany = Campany::find($id);
        $gallery = CampanyImage::select('id','image',DB::raw("DATE_FORMAT(created_at,'%M / %e / %Y') as date"))
        ->where('campany_id',$id)->get(['image'])->toArray();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/campanies/detail', ['campany' => $campany, 'admin' => $admin,'gallery'=>$gallery]);
    }
    public function edit($id)
    {
        $campany = Campany::find($id);
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/campanies/show', ['campany' => $campany, 'admin' => $admin]);
    }

    // update 
    public function update(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = $request->validate([
            'name' => "required|string|min:2|max:40",
            'type' => "required|string|min:2|max:40",
            'employee' => "required|string|min:2|max:40",
            'statement' => "required|string|max:2000",
            'visions' => "required|string|max:2000",
            'what_we_do' => "required|string|max:2000",
            'why_you_should_us' => "required|string|max:2000",
            'address' => "required|string|max:2000",
        ]);

        // for gallery image
        if($request->has('gallery'))
        {
        $old_images = CampanyImage::where('campany_id',$request->id)->get(['image'])->toArray();
        foreach ($old_images as  $img) {
            Storage::delete('campany_gallery/'.$img['image']);
        }
        CampanyImage::where('campany_id',$request->id)->delete();

        foreach ($request->gallery as  $img) {
            $file_name_gallery = uniqid().$img->getClientOriginalName();
            $img->storeAs('campany_gallery',$file_name_gallery);
            CampanyImage::create([
                'campany_id' => $request->id,
                'image' => $file_name_gallery
            ]);
        }
        }

        //for main campany image
        $file_name = $imageuploading->upload($request, $request->id, "campany_images",Campany::class);
        $data['image'] = $file_name;
        Campany::find($request->id)->update($data);

        return redirect('admin/campanies/'.$request->id);

    }

    //delete 
    public function delete($id)
    {
        //gallery data and image delete
        $old_images = CampanyImage::where('campany_id',$id)->get(['image'])->toArray();
        foreach ($old_images as  $img) {
            Storage::delete('campany_gallery/'.$img['image']);
        }
        CampanyImage::where('campany_id',$id)->delete();

        // camapny image and data delete
        $old_img = Campany::find($id)->image;
        Storage::delete('campany_images/'.$old_img);
        Campany::find($id)->delete();
        return redirect('admin/campanies');
    }
}
