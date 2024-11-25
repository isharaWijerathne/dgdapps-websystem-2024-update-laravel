<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\NewsImgController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageImgController;
use App\Http\Controllers\AdminMarketingManager;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/news', function () {
    return view(view: 'news');
})->name("news");


Route::get('/contact-us', function () {
    return view(view: 'contact-us');
})->name("contact-us");





//careers route
Route::get("/careers",[CareersController::class,"index"])->name("careers");
Route::post("admin/careers/careers-create",[CareersController::class,"create"])->name("careers-create");
Route::get("admin/careers/careers-list",[CareersController::class,"showCareersList"])->name("careers-list");
Route::get("admin/careers/edit-careers/{id}",[CareersController::class,"showEditWindow"])->name("edit-careers");
Route::post("admin/careers/edit-careers",[CareersController::class,"editCareers"])->name("edit-careers-post");
Route::delete("admin/careers/delete",[CareersController::class,"deletePost"])->name("delete-careers");
Route::put("admin/careers/change-status",[CareersController::class,"changeStatus"])->name("careers-change-status");




//package
Route::get("/packages",[PackageController::class,'index'])->name("packages");
Route::post('/admin/packages/create-package',[PackageController::class,"createPackage"])->name('package-create');
Route::get("admin/packages/package-list",[PackageController::class,'showList'])->name("package-list");
Route::get("admin/packages/edit-package/{id}",[PackageController::class,'showEditWindow'])->name("edit-package");
Route::post("admin/packages/edit-package",[PackageController::class,'EditPackage'])->name("edit-package-post");
Route::put("admin/packages/change-status",[PackageController::class,"changeStatus"])->name("package-change-status");
Route::delete("admin/packages/delete",[PackageController::class,"deletePackage"])->name("delete-package");


//packageImage
Route::post("admin/package-imgs/change-status",[PackageImgController::class,"changeStatus"])->name("package-img-change-status");
Route::delete("admin/package-imgs/delete",[PackageImgController::class,"deleteImg"])->name("package-img-delete");



//news
Route::post('admin/news/create-news',[NewsController::class,"createNews"])->name("create-news");
Route::get('admin/news/news-list',[NewsController::class,"showList"])->name("news-list");
Route::get("admin/news/edit-news/{id}",[NewsController::class,'showEditWindow'])->name("edit-news");
Route::post("admin/news/edit-news/",[NewsController::class,'editNews'])->name("edit-news-post");
Route::put("admin/news/change-status",[NewsController::class,"changeStatus"])->name("news-change-status");
Route::delete("admin/news/delete",[NewsController::class,"deletePackage"])->name("delete-news");



//newsImgs
Route::post("admin/news-imgs/change-status",[NewsImgController::class,"changeStatus"])->name("news-img-change-status");
Route::delete("admin/news-imgs/delete",[NewsImgController::class,"deleteImg"])->name("news-img-delete");


//admin marketing
Route::get("admin/marketing/marketing-manager-list",[AdminMarketingManager::class,"showManagerList"])->name("marketing-manager-list");
Route::put("admin/marketing/change-status",[AdminMarketingManager::class,"changeStatus"])->name("change-status-mk");
Route::delete("admin/marketing/delete",[AdminMarketingManager::class,"deleteMM"])->name("delete_mk");


//customer
Route::get("admin/customer/contact-list",[CustomerController::class,"index"])->name("customer-contact-list");



Route::get("admin/dashboard",function(){
    return view('admin.dashboard');
})->name('admin-dashboard');



// admin -> package start

Route::get("admin/packages/create-package",function(){
    return view('admin.packages.create-package');
})->name("create-package");





// admin -> package end


//admin -> news start
Route::get("admin/news/create-news",function(){
    return view("admin.news.create-news");
})->name("create-news");


//admin -> news end



//admin -> careers start
Route::get("admin/careers/create-careers",function(){
    return view("admin.careers.create-careers");
})->name("create-careers");






//admin -> careers end


//admin customer contact -> start


Route::get("admin/customer/contact-manager-change",function(){
    return view("admin.customer.customer-manager-change");
})->name("customer-manager-change");

//admin customer contact -> end


//admin marketing - start
// Route::get("admin/marketing/create-marketing-manager",function(){
//     return view("admin.marketing.create-marketing-manager");
// })->name("create-marketing-manager");



Route::get("admin/marketing/marketing-manager-activity",function(){
    return view("admin.marketing.marketing-manager-activity");
})->name("marketing-manager-activity");

//admin marketing - end





//Marketing Profile Start

Route::get("/marketing/dashboard",function(){
    return view("marketing.dashboard");
})->name("marketing-dashboard");

Route::get("/marketing/my-profile",function(){
    return view("marketing.my-profile");
})->name("marketing-myprofile");

Route::get("/marketing/my-work-list",function(){
    return view("marketing.my-work-list");
})->name("marketing-my-work-list");

Route::get("/marketing/change-password",function(){
    return view("marketing.change-password");
})->name("marketing-password-change");

Route::get("/marketing/change-order-status",function(){
    return view("marketing.change-order-status");
})->name("change-order-status");


Route::middleware("auth:marketing_manager")->get("/test-auth",function(){
    return view("marketing.change-order-status");
})->name("test-auth");


//Marketing Profile End

















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware("auth")->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/mm-auth.php';
