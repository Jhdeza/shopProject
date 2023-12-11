<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientInformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\OfertController;
use App\Http\Controllers\ProductsController;
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

Route::get("/index", function () {
    return view("index");
});

Route::get('/', function () {
   
    return view('welcome');
});


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about-us');

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/my-user', MyUserController::class);
Route::resource('/information', ContactInformationController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/ofert', OfertController::class);
Route::resource('/client', ClientInformationController::class);
Route::resource('/product', ProductsController::class);