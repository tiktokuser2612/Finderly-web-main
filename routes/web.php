<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController; 
use App\Http\Controllers\admin\BusinessesController; 
use App\Http\Controllers\admin\CategoriesController; 
use App\Http\Controllers\admin\SpecializationsController; 
use App\Http\Controllers\admin\BannersController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\UserStatusController;

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

//Login
Route::get('/admin',[LoginController::class,'index']);
Route::post('/admin',[LoginController::class,'adminLogin']);

Route::group(['middleware'=>['admin_auth']],function() {
Route::get('Dashboard',[DashboardController::class,'Dashboard']);

//AdminUser
Route::get('User',[UserController::class,'index'])->name('admin.User.index');;
Route::get('User/add', [UserController::class,'add']);
Route::post('User/store', [UserController::class,'store']);
Route::get('User/edit/{id}',[UserController::class,'edit']);
Route::post('User/update',[UserController::class,'update']);
Route::get('User/delete/{id}', [UserController::class, 'delete'])->name('user/delete');
//status
Route::post('user/changeStatus', [UserStatusController::class,'Status']);

//Businesses
Route::get('Businesses',[BusinessesController::class,'index'])->name('admin.Businesses.index');
Route::get('Businesses/add',[BusinessesController::class,'add']);
Route::post('Businesses/store',[BusinessesController::class,'store']);
Route::get('Businesses/edit{id}',[BusinessesController::class,'edit']);
Route::post('Businesses/update',[BusinessesController::class,'update']);

Route::get('Business/delete/{id}', [BusinessesController::class, 'delete'])->name('Business/delete');
//Categories
Route::get('Categories',[CategoriesController::class,'Categories'])->name('admin.Categories.index');
Route::get('Categories/add',[CategoriesController::class,'add']);
Route::post('Categories/store',[CategoriesController::class,'store']);
Route::get('Categories/edit/{id}',[CategoriesController::class,'edit']);
Route::post('Categories/update',[CategoriesController::class,'update']);
Route::get('Categories/delete/{id}',[CategoriesController::class,'delete']);

Route::post('ChangeStatus', [CategoriesController::class,'status']); 
//Specializations
Route::get('Specializations',[SpecializationsController::class,'index']);
Route::get('Specializations/add',[SpecializationsController::class,'add']);
Route::post('Specializations/store',[SpecializationsController::class,'store']);
Route::get('Specializations/edit/{id}',[SpecializationsController::class,'edit']);
Route::post('Specializations/update',[SpecializationsController::class,'update']);
Route::get('Specializations/delete/{id}',[SpecializationsController::class,'delete']);
//Banners
Route::get('Banners',[BannersController::class,'index'])->name('admin.Banners.index');
Route::post('Banner/store',[BannersController::class,'store']);
Route::get('Banner/delete/{id}',[BannersController::class,'delete']);
Route::post('Banner/update',[BannersController::class,'update']);
Route::get('Banners/add',[BannersController::class,'add']);
Route::get('Banners/edit/{id}',[BannersController::class,'edit']);
//profile
Route::get('Profile/Edit-profile',[ProfileController::class,'showProfile']);
Route::post('Profile/Edit-profile',[ProfileController::class,'Update']);
Route::get('Profile/Password-reset',[ProfileController::class,'resetPassword']);
 Route::post('Profile/Password-reset',[ProfileController::class,'reset']);

 Route::get('admin/logout',[LoginController::class,'logout']);

});



