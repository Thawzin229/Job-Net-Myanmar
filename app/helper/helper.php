<?php
namespace App;

use App\Models\Bookmark;
use App\Models\Campany;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Location;
use App\Models\JobFuntionality;
use Illuminate\Support\Facades\Storage;

class ImageUploading
{
  public function upload($request, $id = null, $folder = null, $model)
  {

    if ($request->hasFile('image')) {
      if ($id !== null) {
        $old_image = $model::find($id)->image;
        Storage::delete($folder . "/" . $old_image);
      }
      $file_name = uniqid() . $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs($folder, $file_name);
      return $file_name;
    } else {
      $file_name = $model::find($id)->image;
      return $file_name;
    }
  }

  public function uploadCV($request, $id = null, $folder = null, $model)
  {

    if ($request->hasFile('cv')) {
      if ($id !== null) {
        $old_cv = $model::find($id)->cv;
        Storage::delete($folder . "/" . $old_cv);
      }
      $file_name = uniqid() . $request->file('cv')->getClientOriginalName();
      $request->file('cv')->storeAs($folder, $file_name);
      return $file_name;
    } else {
      $file_name = $model::find($id)->cv;
      return $file_name;
    }
  }
  public static function uploadPivotImage($request, $id = null, $folder = null, $model, $pivot_id = null)
  {

    if ($request->hasFile('image')) {
      if ($id !== null) {
        $old_image = $model::where($pivot_id, $id)->first()->image;
        Storage::delete($folder . "/" . $old_image);
      }
      $file_name = uniqid() . $id . $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs($folder, $file_name);
      return $file_name;
    } else {
      $file_name = $model::where($pivot_id, $id)->first()->image;
      return $file_name;
    }
  }
}

class Validation
{
  public static function profileValidation($request,$user=null)
  {
    return $user === null ? $request->validate([
      'name' => 'required|string|max:50',
      'hobby' => 'required|string|max:50',
      // 'image' => 'sometimes|image|mimes:png,jpg|size:2000',
      'gender' => 'required|string|max:50',
      'birthday' => 'required|string|max:50',
      'job' => 'required|string|max:50',
      'phone' => 'required|string|max:50',
      'address' => 'required|string|max:300',
      'city' => 'required|string|max:300',
      'state' => 'required|string|max:300',
      'address_number' => 'required|numeric|',
    ]) :
    $request->validate([
      'name' => 'required|string|max:50',
      'hobby' => 'required|string|max:50',
      // 'image' => 'sometimes|image|mimes:png,jpg|size:2000',
      'gender' => 'required|string|max:50',
      'birthday' => 'required|string|max:50',
      'job' => 'required|string|max:50',
      'phone' => 'required|string|max:50',
      'address' => 'required|string|max:300',
      'city' => 'required|string|max:300',
      'state' => 'required|string|max:300',
    ]);
  }

  public static function jobValidation($request, $id = null)
  {
    return $id === null ?  $request->validate([
      'campany' => ['required', 'max:100'],
      'employer' => ['required', 'max:100'],
      'email' => ['required', 'email'],
      'fee' => ['required','string'],
      'job_title' => ['required', 'string', 'max:200'],
      'location' => ['required', 'string', 'max:200'],
      'job_type' => ['required', 'string', 'max:200'],
      'category' => ['required', 'array'],
      'job_tag' => ['required', 'string', 'max:200'],
      'description' => ['required', 'string', 'max:1000'],
      'requirement' => ['required', 'string', 'max:1000'],
      'application_email' => ['required', 'string', 'max:100'],
      'deadline' => ['required', 'string', 'max:100'],
      'website_link' => ['required', 'string', 'max:100'],
      'tag_line' => ['required', 'string', 'max:100'],
      'twitter_user_name' => ['required', 'string', 'max:100'],
      'image' => ['required', 'file', 'image', 'max:2000'],
    ]) :
    $request->validate([
      'campany_id' => ['required', 'max:100'],
      'employer_id' => ['required', 'max:100'],
      'email' => ['required', 'email'],
      'fee' => ['required','string'],
      'job_title' => ['required', 'string', 'max:200'],
      'location' => ['required', 'numeric', 'max:200'],
      'job_type' => ['required', 'numeric', 'max:200'],
      'category' => ['required',],
      'job_tag' => ['required', 'string', 'max:200'],
      'description' => ['required', 'string', 'max:1000'],
      'requirement' => ['required', 'string', 'max:1000'],
      'application_email' => ['required', 'string', 'max:100'],
      'deadline' => ['required', 'string', 'max:100'],
      'website_link' => ['required', 'string', 'max:100'],
      'tag_line' => ['required', 'string', 'max:100'],
      'twitter_user_name' => ['required', 'string', 'max:100'],
      // 'image' => ['required', 'file', 'image', 'max:2000'],
  ]);
  }
}

class FormData
{
  public static function data()
  {
    $locations = Location::take(8)->get()->toArray();
    $categories = Category::take(8)->get()->toArray();
    $campanies = Campany::get()->toArray();
    $employers = Employer::get()->toArray();
    $job_types = JobFuntionality::take(8)->get()->toArray();


    $form_data = [
      'location' => $locations,
      'categories' => $categories,
      'campanies' => $campanies,
      'employers' => $employers,
      'job_types' => $job_types,
    ];

    return $form_data;
  }
}

class Getcategories{
  public static function get($job)
  {
    $categories = json_decode($job['jobdetails']['category']);
    $final_categories = Category::whereIn('id', $categories)->get()->pluck('name');
    $job['jobdetails']['category_data'] = $final_categories;  // current job
    $bookmarked_jobs = Bookmark::pluck('job_id')->toArray();
    $job['is_bookmarked'] = in_array($job['id'],$bookmarked_jobs) ? true :false;
  }
}