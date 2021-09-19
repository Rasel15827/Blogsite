<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('/',[MainController::class,'main'])->name('home.display');
Route::get('/blog',[MainController::class,'blog'])->name('blog.display');
Route::get('/contact',[MainController::class,'contact'])->name('contact.display');

//Route::get('/admin',[AdminController::class,'controlBoard'])->name('controlBoard.display')->middleware('auth');

//admin panel group routes

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){
   Route::get("/dashboard",function(){
    return view('controlBoard');
   });
   
   Route::resource('catagory',CatagoryController::class);


});