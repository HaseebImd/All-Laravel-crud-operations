<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaseebImdad;

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



Route::get('/login', function () {
    return view('login');
});

Route::post('login',[HaseebImdad::class,'user_login']);
Route::get('/',[HaseebImdad::class,'home']);
Route::get('addfriend',[HaseebImdad::class,'addfriend']);
Route::post('savefriend',[HaseebImdad::class,'savefriend']);
Route::get("unfriend/{id}",[HaseebImdad::class,'unfriend']);
Route::get('/customizefriend/{id}',[HaseebImdad::class,'customizefriend']);
Route::post('/customizefriend/save_customizefriend',[HaseebImdad::class,'save_customizefriend']);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});