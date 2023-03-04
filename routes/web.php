<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\authcontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orderview',[OrderController::class,'OrderView']);



Route::post('afterlogin',[authcontroller::class,'loginuser'])->name('afterlogin');
Route::get('layout',[authcontroller::class,'layout'])->name('layout');
Route::post('afterregister',[authcontroller::class,'registeruser'])->name('afterregister');
Route::get('logout',[authcontroller::class,'logout'])->name('logout');

Route::get('dashboard',[authcontroller::class,'dashboard'])->name('dashboard');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});

Route::get('user/addRoles',[authcontroller::class,'addRoles'])->name('user/addRoles');
Route::post('afteraddrole',[authcontroller::class,'afteraddrole'])->name('afteraddrole');
Route::get('user/mapRoles',[authcontroller::class,'mapRoles'])->name('user/mapRoles');
Route::post('aftermaprole',[authcontroller::class,'aftermaprole'])->name('aftermaprole');
Route::get('user/mapMenu',[authcontroller::class,'mapmenu'])->name('user/mapMenu');
Route::post('aftermapmenu',[authcontroller::class,'aftermapmenu'])->name('aftermapmenu');
// Route::group(['middleware'=>['Authenticate']],function(){
    
    
// });

Route::get('check',[authcontroller::class,'check'])->middleware(['auth','can:isAllowed']);
// Route::get('/store',function(){
//     $category=Request('category');
//     if(isset($category)){
//     return '<h2>You are viewing category of </h2>'.strip_tags($category);
//     }
    
//         return '<h2>You are viewing category of all instruments</h2>';

// });
// Route::get('/store/{category?}/{items?}',function($category=null,$items=null){
//     if(isset($category)){
//         if(isset($items)){
//             return 'You are viewing '.$category.' of '.$items;
//         }
//     return 'You are viewing category of '.strip_tags($category);
//     }
    
//         return '<h2>You are viewing category of all instruments</h2>';

// });



