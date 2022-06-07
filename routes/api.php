<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SecurityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('otpVerification', function () {
//     return "text";
//     });
 Route::post('register','API\UserController@register');
 Route::post('login','API\UserController@login');
 Route::post('testing','API\SecurityController@testing');
 Route::post('forgotPassword','API\UserController@forgotPassword');
 Route::Post('forgotPasswordOtpVerification','API\UserController@forgotPasswordOtpVerification');
Route::post('passwordChange','API\UserController@Passwordchange');

Route::group(['middleware' => 'auth:api'], function(){
//Send_email_Otp
Route::post('sendOTP', 'API\UserController@sendOTP');
//otpVerification
Route::post('otpVerification','API\UserController@otpVerification');
//ProfileUpdate
Route::post('profile-update','API\UserController@registerProfilePhote');
Route::post('logout','API\UserController@logout');
Route::post('updateProfile','API\UserController@profileUpdate');
Route::post('getBusiness','API\UserController@getbusiness');
Route::post('getbusinessCategory','API\UserController@getBusinessaccondingCategory');
Route::post('likeBusiness','API\UserController@likeUnlikeBusiness');
Route::get('getCategorie','API\UserController@getcategories');
Route::get('getSpecialization','API\UserController@getSpecializations');

});


