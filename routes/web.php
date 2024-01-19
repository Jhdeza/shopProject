<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientInformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\OfertController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
   
    return view('admin.index');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about-us');
Route::get('/productGrid/{slug?}/{sub_slug?}', [App\Http\Controllers\HomeController::class, 'productGrid'])->name('Product-grids');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/productDetails/{id}', [App\Http\Controllers\HomeController::class, 'productDetails'])->name('product-details');
Route::post('/productGrid/{slug?}/{sub_slug?}', [App\Http\Controllers\HomeController::class, 'productGrid'])->name('Product-grids');




// Route::get('/dashboard', function () {
//        return view('template.template');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();

Route::prefix('admin')->group(function () {

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/my-user', MyUserController::class);
Route::resource('/information', ContactInformationController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/ofert', OfertController::class);
Route::resource('/client', ClientInformationController::class);
Route::resource('/product', ProductsController::class);
Route::resource('/about-us', AboutUsController::class);
Route::resource('/staff', StaffController::class);

});