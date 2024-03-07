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
Route::get('/home', "AuthController@Home")->Name('Home');
Route::get('/login', "AuthController@login")->Name('login');

Route::get('/register', "AuthController@register")->Name('register');
Route::post('/register/store', "AuthController@SubmitRegister")->Name('SubmitRegister');
Route::post('/login/verify', "AuthController@LoginVerify")->Name('LoginVerify');
Route::get('/logout', "AuthController@Logout")->Name('Logout');
Route::get('/adminpromotion', "AuthController@adminpromotion")->Name('adminpromotion');
Route::get('/adminpromotioncat', "AuthController@adminpromotioncat")->Name('adminpromotioncat');

Route::post('/room/filter', "AuthController@roomFilter")->Name('roomFilter');
Route::get('/room', "AuthController@room")->Name('room');
Route::get('/payment', "AuthController@payment")->Name('payment');
Route::get('/cat', "AuthController@cat")->Name('cat');
Route::get('/shower', "AuthController@shower")->Name('shower');
Route::get('/adminhome', "AuthController@adminhome")->Name('adminhome');//->middleware('redirectIfAuth');

Route::post('/confirm/payment', "AuthController@ConfirmPayment")->Name('ConfirmPayment');
Route::get('/dayreport', "AuthController@dayreport")->Name('dayreport');
Route::get('/profile', "AuthController@profile")->Name('profile');
// Route::get('/profile', "AuthController@profile")->Name('profile');
Route::get('/adminprofile', "AuthController@adminprofile")->Name('adminprofile');
Route::get('/monthreport', "AuthController@monthreport")->Name('monthreport');
Route::get('/yearreport', "AuthController@yearreport")->Name('yearreport');
Route::post('/profile/store', "AuthController@SubmitProfileEdit")->Name('SubmitProfileEdit');
Route::post('/profile', "AuthController@SubmitProfileEditPassword")->Name('SubmitProfileEditPassword');

Route::get('/admineditroom', "AuthController@admineditroom")->Name('admineditroom');
Route::post('/admineditroom/store', "AuthController@SubmitRoomEdit")->Name('SubmitRoomEdit');
Route::post('/admineditroom/delete', "AuthController@SubmitRoomDelete")->Name('SubmitRoomDelete');
Route::post('/cat/store', "AuthController@SubmitCat")->Name('SubmitCat');
Route::post('/cat/delete', "AuthController@SubmitCatDelete")->Name('SubmitCatDelete');
Route::post('/Home/store', "AuthController@SubmitRoomReserve")->Name('SubmitRoomReserve');
Route::post('/cat', "AuthController@SubmitCatEdit")->Name('SubmitCatEdit');

Route::get('/adminedituser', "AuthController@adminedituser")->Name('adminedituser');
Route::post('/adminedituser/delete', "AuthController@SubmitUserDelete")->Name('SubmitUserDelete');
Route::get('/admineditprofile', "AuthController@admineditprofile")->Name('admineditprofile');
Route::get('/adminconfirmcat', "AuthController@adminconfirmcat")->Name('adminconfirmcat');
Route::get('/payment_cat', "AuthController@payment_cat")->Name('payment_cat');
Route::post('/shower/store', "AuthController@SubmitShower")->Name('SubmitShower');
Route::post('/shower/filter', "AuthController@showerFilter")->Name('showerFilter');

Route::post('/payshower/store', "AuthController@ConfirmPayment_cat")->Name('ConfirmPayment_cat');
Route::post('/payment/store', "AuthController@SubmitEditDate")->Name('SubmitEditDate');
Route::post('/promotion', "AuthController@Submitpromotion")->Name('Submitpromotion');
Route::post('/promotion/delete', "AuthController@SubmitPromotionDelete")->Name('SubmitPromotionDelete');
Route::post('/promotionshower', "AuthController@Submitpromotioncat")->Name('Submitpromotioncat');
Route::post('/promotionshower/delete', "AuthController@SubmitPromotionshowerDelete")->Name('SubmitPromotionshowerDelete');
Route::post('/clear', "AuthController@ConfirmRoomClear")->Name('ConfirmRoomClear');
Route::get('/admincat', "AuthController@admincat")->Name('admincat');
