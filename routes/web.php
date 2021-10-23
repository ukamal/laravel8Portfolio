<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultipleController;
use App\Models\Brand;
use App\Models\About;
use App\Models\Multiple;
use App\Models\Contact;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceSectionController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\ChangePasswordController;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    //$brands = Brand::all();
    $brands = DB::table('brands')->get();
    $abouts = DB::table('abouts')->first();
    $pageservice = DB::table('service_sections')->first();
    $services = DB::table('service_sections')->get();
    $multiimg = Multiple::all();
    return view('frontend_home',compact('brands','abouts','services','pageservice','multiimg'));
});

Route::get('/home', function () {
    echo 'This is Home';
});




Route::get('/about',[ContactController::class, 'about'])->middleware('age');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Change Password
Route::get('/change-password',[ChangePasswordController::class, 'ChangePass'])->name('change-password');
Route::post('/update-password',[ChangePasswordController::class, 'updatePass'])->name('password-update');

//Update Profile
Route::get('/update-profile',[ChangePasswordController::class, 'updateProfile'])->name('update-profile');
Route::post('/admin-profile',[ChangePasswordController::class, 'adminProfile'])->name('admin-profile-update');

//Admin Contact
Route::get('/view-contact', [ContactController::class, 'adminContact'])->name('all-contact');
Route::get('/add-contact', [ContactController::class, 'addContact'])->name('add-contact');
Route::post('/store-contact', [ContactController::class, 'storContact'])->name('store-contact');
Route::get('/edit-contact/{id}', [ContactController::class, 'editContact'])->name('edit-contac');
Route::post('/update-contact/{id}', [ContactController::class, 'updateContact'])->name('update-contact');
Route::get('/delete-contact/{id}', [ContactController::class, 'deleteContact'])->name('delete-contact');
//Frontend Contact
Route::get('/contact-us',[ContactController::class, 'contact'])->name('contact');
Route::post('/store-contact-form',[ContactController::class, 'storeConForm'])->name('store-contact-form');
Route::get('/view-contact-form',[ContactController::class, 'viewConForm'])->name('view-contact-form');
Route::get('/delet-contact-form/{id}',[ContactController::class, 'deleteConForm'])->name('delete-contact-form');
//Subcribe
Route::post('/subscribe',[ContactController::class, 'subscribe'])->name('subscribe');
Route::get('/view-subscribe',[ContactController::class, 'viewSubcribe'])->name('view-subscribe');
Route::get('/delet-subscribe/{id}',[ContactController::class, 'deleteSubcribe'])->name('delete-subscribe');

Route::get('all/category',[CategoryController::class, 'index'])->name('all.category');
Route::post('add/category',[CategoryController::class, 'addCat'])->name('cat.store');
Route::post('show/category/{id}',[CategoryController::class, 'showCat'])->name('cat.show');
Route::get('edit/cat/{id}',[CategoryController::class, 'editCat'])->name('edit-cat');
Route::post('update/cat/{id}',[CategoryController::class, 'update'])->name('cat-update');
Route::get('soft/delete/{id}',[CategoryController::class, 'softDelete'])->name('soft-delete');
Route::get('restore-cat/{id}',[CategoryController::class, 'restoreCat'])->name('restore-cat');
Route::get('pdelete/{id}',[CategoryController::class, 'pDelete'])->name('pdelete');

//Brand area
Route::get('all/brand',[BrandController::class, 'index'])->name('all.brand');
Route::get('add/brand',[BrandController::class, 'addBrand'])->name('add.brand');
Route::post('add/store',[BrandController::class, 'store'])->name('brand-store');
Route::get('edit/brand/{id}',[BrandController::class, 'brandEdit'])->name('edit-brand');
Route::post('update/brand/{id}',[BrandController::class, 'brandUpdate'])->name('update-brand');
Route::get('delete/brand/{id}',[BrandController::class, 'brandDelete'])->name('delete-brand');

//Multiple Image
Route::get('all/multiple', [BrandController::class, 'allMultipleImg'])->name('all.multiple');
Route::post('multi/img/store', [BrandController::class, 'multiImgStore'])->name('multi-img-store');

//Portfolio
Route::get('portfolio',[PortfolioController::class, 'portfolio'])->name('portfolio');

Route::get('user/logout', [BrandController::class, 'userLogout'])->name('user-logout');

//Slider 
Route::get('all/slider',[SliderController::class, 'index'])->name('all-slider');
Route::get('add/slider',[SliderController::class, 'addSlider'])->name('add-slider');
Route::post('store/slider',[SliderController::class, 'storeSlider'])->name('store-slider');
Route::get('edit/slider/{id}',[SliderController::class, 'editSlider'])->name('edit-slider');
Route::post('update/slider/{id}',[SliderController::class, 'updateSlider'])->name('update-slider');
Route::get('delete/slider/{id}',[SliderController::class, 'deleteSlider'])->name('delete-slider');

//About 
Route::get('all/about',[AboutController::class, 'index'])->name('all-about');
Route::get('add/about',[AboutController::class, 'addAbout'])->name('add-about');
Route::post('store/about',[AboutController::class, 'store'])->name('store-about');
Route::get('edit/about/{id}',[AboutController::class, 'edit'])->name('edit-about');
Route::post('update/about/{id}',[AboutController::class, 'updateAbout'])->name('update-about');
Route::get('delete/about/{id}',[AboutController::class, 'destroy'])->name('delete-about');
//About home page
Route::get('/about-page',[AboutController::class, 'aboutHomePage'])->name('about-page');

//Services 
Route::get('all/service',[ServiceSectionController::class, 'index'])->name('all-service');
Route::get('add/service',[ServiceSectionController::class, 'create'])->name('add-service');
Route::post('store/service',[ServiceSectionController::class, 'store'])->name('store-service');
Route::get('edit/service/{id}',[ServiceSectionController::class, 'edit'])->name('edit-service');
Route::post('update/service/{id}',[ServiceSectionController::class, 'update'])->name('update-service');
Route::get('delete/service/{id}',[ServiceSectionController::class, 'destroy'])->name('delete-service');

//Service home page
Route::get('/service-page',[ServiceSectionController::class, 'seriveHomePage'])->name('service-page');





