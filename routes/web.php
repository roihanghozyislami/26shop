<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\produkcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-page',[logincontroller::class, 'registerpage']);
Route::get('/login-page',[logincontroller::class, 'loginpage']);
Route::get('/dashboard',[logincontroller::class,'dashboard']);
Route::post('/login',[logincontroller::class,'login']);
Route::get('logout',[logincontroller::class,'logout']);
Route::post('/register',[logincontroller::class,'register']);

Route::get('/user',[usercontroller::class,'userpage']);
Route::post('/user/store',[usercontroller::class,'store']);
Route::post('/user/update/{id}', [usercontroller::class, 'update']);
Route::post('/user/delete/{id}', [usercontroller::class, 'delete']);
Route::get('/user/export/pdf', [usercontroller::class, 'exportPdf']);


Route::get('/produk',[produkcontroller::class,'produkpage']);
Route::post('/produk/store',[produkcontroller::class,'store']);
Route::post('/produk/update/{id}', [produkcontroller::class, 'update']);
Route::post('/produk/delete/{id}', [produkcontroller::class, 'delete']);
Route::get('/produk/export/pdf', [produkcontroller::class, 'exportPdf']);
