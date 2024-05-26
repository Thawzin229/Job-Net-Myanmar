<?php

use App\Http\Controllers\AddJobsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminUserListController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\BrowseResumeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\MainJobController;
use App\Http\Controllers\ManageJobController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserDashBoardController;
use App\Http\Controllers\UserFAQController;
use App\Http\Controllers\UserHomeController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Location;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CampanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\JobFuntionalityController;


#Oatuh2 
Route::group(['prefix' => 'auth','middleware'=>'login_check'], function () {
    Route::get('google/redirect', [GoogleController::class, "redirect"]);
    Route::get('google/call-back', [GoogleController::class, "login"]);

    Route::get('github/redirect', [GithubController::class, "redirect"]);
    Route::get('github/call-back', [GithubController::class, "login"]);
});


#authentication (admin)
Route::group(['prefix' => 'admin/auth','middleware' => 'login_check'], function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/sign-up', 'signuppage');
        Route::post('/sign-up', 'signup');

        #password login
        Route::get('/sign-in', 'signinpage');
        Route::post('/sign-in', 'signin');

        #otp login
        Route::get('/sign-in/otp', 'otppage');
        Route::post('/sign-in/otp', 'sendEmail');

        Route::get('/sign-in/otp-login', 'otpLoginPage');
        Route::post('/sign-in/otp-login', 'optlogin');


        Route::post('logout', 'logout')->withoutMiddleware(CheckLoginMiddleware::class);
    });
});

#authentication (user)
Route::group(['prefix' => 'user/auth','middleware' => 'guest'], function () {
    Route::controller(UserAuthController::class)->group(function () {
        Route::get('/sign-up', 'signuppage');
        Route::post('/sign-up', 'signup');

        #password login
        Route::get('/sign-in', 'signinpage')->name('login');
        Route::post('/sign-in', 'signin');

        #otp login
        Route::get('/sign-in/otp', 'otppage');
        Route::post('/sign-in/otp', 'sendEmail');

        Route::get('/sign-in/otp-login', 'otpLoginPage');
        Route::post('/sign-in/otp-login', 'optlogin');

        #forget password 
        Route::get('forget-password', 'fgPage');
        Route::post('forget-password', 'sendtoken');

        Route::get('forget-password/change', 'changepasspage');
        Route::post('forget-password/check', 'checkToken');

        Route::get('forget-password/update', 'updatepasspage');
        Route::post('forget-password/update', 'updatePass');

        Route::post('logout', 'logout')->withoutMiddleware('guest');
    });
});

#admin routes
Route::group(['prefix' => 'admin','middleware' => 'admin_auth'], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/{id}', 'edit');
        Route::post('/categories', 'create'); 
        Route::patch('/categories', 'update');
        Route::delete('/categories/{id}', 'delete');
    });
    Route::controller(JobFuntionalityController::class)->group(function () {
        Route::get('/job-functions', 'index');
        Route::post('/job-functions', 'create');
        Route::get('/job-functions/{id}', 'edit');
        Route::patch('/job-functions/', 'update');
        Route::delete('/job-functions/{id}', 'delete');
    });

    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'index');
        Route::post('/locations', 'create');
        Route::get('/locations/{id}', 'edit');
        Route::patch('/locations/', 'update');
        Route::delete('/locations/{id}', 'delete');
    });

    Route::controller(CampanyController::class)->group(function () {
        Route::get('/campanies', 'index');
        Route::post('/campanies', 'create');
        Route::get('/campanies/{id}', 'detail');
        Route::get('/campanies/edit/{id}', 'edit');
        Route::patch('/campanies/', 'update');
        Route::delete('/campanies/{id}', 'delete');
    });


    Route::controller(EmployerController::class)->group(function () {
        Route::get('/employers', 'index');
        Route::post('/employers', 'create');
        Route::get('/employers/edit/{id}', 'edit');
        Route::patch('/employers/', 'update');
        Route::delete('/employers/{id}', 'delete');
    });
    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/profiles', 'index');
        Route::post('/profiles', 'update');
        Route::patch('/profiles/change-password', 'updatePass');
    });

    Route::controller(AdminUserListController::class)->group(function () {
        Route::get('/userlists', 'index');
        Route::get('/userlists/{id}', 'show');
        Route::post('/userlists', 'update');
        Route::delete('/userlists/{id}', 'delete');
    });
    Route::controller(FAQController::class)->group(function () {
        Route::get('/faqs', 'index');
        Route::post('/faqs', 'create');
        Route::get('/faqs/{id}', 'show');
        Route::patch('/faqs', 'update');
        Route::delete('/faqs/{id}', 'delete');
    });
});

#user routes
Route::group(['prefix' => 'user'], function () {

    Route::controller(UserHomeController::class)->group(function(){
        Route::get('/home','index');
    });

    Route::controller(AddJobsController::class)->group(function(){
        Route::get('/add-job','index')->middleware('auth');
        Route::post('/add-job','create')->middleware('auth');
    });

    Route::controller(ManageJobController::class)->group(function(){
        Route::get('/manage-job','index')->middleware('auth');
        Route::delete('/manage-job/{id}','delete')->middleware('auth');
        Route::get('/manage-job/{id}','show')->middleware('auth');
        Route::post('/manage-job','update')->middleware('auth');
    });

    Route::controller(MainJobController::class)->group(function(){
        Route::get('/jobs','index');
        Route::get('/jobs/{id}','show');
    });

    Route::controller(ApplicationController::class)->group(function(){
        Route::post('/applications','create')->middleware('auth');
        Route::get('/applications/{id}','index')->middleware('auth');
        Route::patch('/applications/status/{id}','changeStatus')->middleware('auth');
        Route::post('/applications/note/','Note')->middleware('auth');
        Route::delete('/applications/{id}','Delete')->middleware('auth');
    }); 


    Route::controller(BookmarkController::class)->group(function(){
        Route::post('book-marks','create');
        Route::get('book-marks','index');
    }); 

    Route::controller(CategoryController::class)->group(function(){
        Route::get('browse-categories','browseCatePage');
    }); 
    Route::controller(ResumeController::class)->group(function(){
        Route::get('resumes/create','createPage')->middleware('auth');
        Route::get('resumes','index')->middleware('auth');
        Route::post('resumes/','create')->middleware('auth');
        Route::get('resumes/{id}','show')->middleware('auth');
        Route::get('resumes/edit/{id}','edit')->middleware('auth');
        Route::post('resumes/update','update')->middleware('auth');
        Route::delete('resumes/{id}','delete')->middleware('auth');
    });

    Route::controller(UserDashBoardController::class)->group(function(){
        Route::get('dashboards','index');
        Route::get('dashboards/edit','edit');
        Route::post('dashboards','update');
        Route::get('dashboards/password','passwordPage');
        Route::patch('dashboards/password','updatePass');
    }); 
    Route::controller(ReviewController::class)->group(function(){
        Route::get('reviews','index');
        Route::post('reviews','create');
    }); 

    Route::controller(BrowseResumeController::class)->group(function(){
        Route::get('browse-resumes','index');
    }); 

    Route::controller(UserFAQController::class)->group(function () {
        Route::get('/faqs', 'index');
    });
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blogs', 'index');
        Route::get('/blogs/createpage', 'createpage')->middleware('auth');
        Route::get('/blogs/{id}', 'show');
        Route::post('/blogs', 'create');

        Route::post('/blogs/comments','cmt');
    });

    Route::get('testing',function(){
        return Inertia::render('user/testing');
    }); 



});


