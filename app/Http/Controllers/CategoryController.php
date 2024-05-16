<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use App\ImageUploading;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //page 
    public function index()
    {   
        
        $search = request('search');
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $datas = Category::FetchData($search)
        ->latest()->paginate(10)->withQueryString();

        return Inertia::render('admin/categories/index',[
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
            'image' => "required|file|image|max:2000",
        ]);

        $file_name = $imageuploading->upload($request,$id=null,"category_images",Category::class);
        $data['image'] = $file_name;
        Category::create($data);

        return back();

    }

    //edit 
    public function edit($id)
    {
        $category_update = Category::find($id);
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        return Inertia::render('admin/categories/show',['category_update'=> $category_update,'admin'=> $admin]);
    }

    // update 
    public function update(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = $request->validate([
            'name' => "required|string|min:2|max:40",
            'status' => "required|string",
        ]);

        $file_name = $imageuploading->upload($request,$request->id,"category_images",Category::class);
        $data['image'] = $file_name;
        Category::find($request->id)->update($data);

        return redirect('admin/categories');

    }

    //delete 
    public function delete($id)
    {
        $old_image = Category::find($id)->image;
        Storage::delete("category_images/".$old_image);
        Category::find($id)->delete();
        return redirect('admin/categories');
    }


    // users functions 
    public function browseCatePage()
    {
        $categories = Category::take(40)->get()->toArray();
        return Inertia::render('user/browse-categories/index',['categories' => $categories]);
    }
}
