<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', "AuthController@Home")->Name('Home');
Route::get('/login', "AuthController@login")->Name('login');
Route::get('/register', "AuthController@register")->Name('register');
Route::post('/register/store', "AuthController@RegisterStore")->Name('RegisterStore');
Route::get('/room', "AuthController@room")->Name('room');
Route::get('/payment', "AuthController@payment")->Name('payment');
Route::get('/shower', "AuthController@shower")->Name('shower');