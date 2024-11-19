<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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


//customer contact -> start
Route::get("admin/customer/contact-list",function(){
    return view("admin.customer.customer-contact-view");
})->name("customer-contact-list");

Route::get("admin/customer/contact-manager-change",function(){
    return view("admin.customer.customer-manager-change");
})->name("customer-manager-change");

//customer contact -> end






















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
