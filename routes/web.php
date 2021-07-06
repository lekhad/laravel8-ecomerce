<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*This is gotten from laravel8 documentation */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
});


Route::get('/home', function () {
    echo " This is Home page ";
});

Route::get('/about', function(){
    return view('about');
});

// Route::get('/about', function () {
//     return view('about');
// })->middleware('check');


// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact-sdbjksd-sdhbh', [ContactController::class, 'index'])->name('ariyan');

// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);


// For Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

// Admin All Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    /** This displays Users in the first place without creating a controller */
    // $users = User::all(); 

    // Using Query Builder 
    // $users= DB::table('users')->get();

    // return view('dashboard', compact('users'));

    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
