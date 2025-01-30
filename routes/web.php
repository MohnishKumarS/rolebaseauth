<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
   

    Route::controller(AdminController::class)->group(function(){
        Route::get('admindashboard','index')->name('admin.dashboard');


    });
    Route::controller(AdminController::class)->group(function(){
        Route::get('profiles','viewProfile')->name('admin.profile.index');
        Route::get('profile-view/{id}','view')->name('admin.profile.view');
        Route::get('profile-create','create')->name('admin.profile.create');
        Route::post('profile-store','store')->name('admin.profile.store');
        Route::get('profile-edit/{id}','edit')->name('admin.profile.edit');
        Route::put('profile-update/{id}','update')->name('admin.profile.update');
        Route::get('profile-delete/{id}','destroy')->name('admin.profile.destroy');
    });

    Route::view('/admin','errors.404');

});


Route::get('/clear', function() {
   
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('optimize');
 
    return "Cleared!";
 
 });
 

require __DIR__.'/auth.php';
