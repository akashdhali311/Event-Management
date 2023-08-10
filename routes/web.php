<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventTypeController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('single-event/{id}',[HomeController::class,'singleEvent'])->name('singleEvent');
Route::post('comment',[HomeController::class,'comment'])->name('comment');
Route::get('user-is-going/{id}/{c_id}',[HomeController::class,'userIsGoing'])->name('user_is_going');



Route::get('sign-in',[AuthController::class,'signin'])->name('signin');
Route::post('sign-in',[AuthController::class,'postSignin'])->name('signin');
Route::post('sign-out',[AuthController::class,'signOut'])->name('signout');
Route::get('sign-up',[AuthController::class,'signup'])->name('signup');
Route::post('sign-up',[AuthController::class,'postSignup'])->name('signup');

Route::middleware('auth')->group(function(){
     
    Route::get('/dashboard',DashboardController::class,)->name('dashboard');
    Route::get('/admin-dashboard',[DashboardController::class,"admin"])->name('admindashboard');
    Route::resource('/events',EventController::class);
    Route::resource('/eventTypes',EventTypeController::class);   
    Route::resource('/adminUser',AdminUserController::class);
    

});






