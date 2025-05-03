<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\usercontroller;


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
