<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/packages', function () {
    return view(view: 'packages');
})->name("packages");


Route::get('/news', function () {
    return view(view: 'news');
})->name("news");


Route::get('/careers', function () {
    return view(view: 'careers');
})->name("careers");


Route::get('/contact-us', function () {
    return view(view: 'contact-us');
})->name("contact-us");







Route::get("admin/dashboard",function(){
    return view('admin.dashboard');
})->name('admin-dashboard');



// admin -> package start

Route::get("admin/packages/create-package",function(){
    return view('admin.packages.create-package');
})->name("create-package");

Route::get("admin/packages/edit-package",function(){
    return view('admin.packages.edit-package');
})->name("edit-package");

Route::get("admin/packages/edit-package",function(){
    return view('admin.packages.edit-package');
})->name("edit-package");

Route::get("admin/packages/package-list",function(){
    return view('admin.packages.package-list');
})->name("package-list");
// admin -> package end


//admin -> news start
Route::get("admin/news/create-news",function(){
    return view("admin.news.create-news");
})->name("create-news");

Route::get("admin/news/edit-news",function(){
    return view("admin.news.edit-news");
})->name("edit-news");

Route::get("admin/news/news-list",function(){
    return view("admin.news.news-list");
})->name("news-list");

//admin -> news end



//admin -> careers start
Route::get("admin/careers/create-careers",function(){
    return view("admin.careers.create-careers");
})->name("create-careers");

Route::get("admin/careers/edit-careers",function(){
    return view("admin.careers.edit-careers");
})->name("edit-careers");


Route::get("admin/careers/careers-list",function(){
    return view("admin.careers.careers-list");
})->name("careers-list");

//admin -> careers end


//admin customer contact -> start
Route::get("admin/customer/contact-list",function(){
    return view("admin.customer.customer-contact-view");
})->name("customer-contact-list");

Route::get("admin/customer/contact-manager-change",function(){
    return view("admin.customer.customer-manager-change");
})->name("customer-manager-change");

//admin customer contact -> end


//admin marketing - start
Route::get("admin/marketing/create-marketing-manager",function(){
    return view("admin.marketing.create-marketing-manager");
})->name("create-marketing-manager");

Route::get("admin/marketing/marketing-manager-list",function(){
    return view("admin.marketing.marketing-manager-list");
})->name("marketing-manager-list");

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

//Marketing Profile End

















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
