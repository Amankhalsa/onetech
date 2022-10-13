<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainUserController;

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

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
    
})->name('dashboard');
// admin.logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');



Route::get('/user/logout', [MainUserController::class, 'userLogout'])->name('user.logout');
// user.profile
Route::get('/user/profile', [MainUserController::class, 'userProfile'])->name('user.profile');
// edit.profile
Route::get('/edit/user/profile', [MainUserController::class, 'editUserProfile'])->name('edit.profile');
// profile.store
Route::post('/update/user/profile', [MainUserController::class, 'updateProfile'])->name('profile.store');
// user.password.view
Route::get('/user/password/view', [MainUserController::class, 'userPasswordView'])->name('user.password.view');
// password.update
Route::post('/user/password/update', [MainUserController::class, 'userPasswordupdate'])->name('password.update');


// admin.profile

Route::get('admin/profile', [MainAdminController::class, 'adminProfile'])->name('admin.profile');
// edit.admin.profile
Route::get('edit/admin/profile', [MainAdminController::class, 'editadminProfile'])->name('edit.admin.profile');
// updateAdminProfile
Route::post('update/admin/profile', [MainAdminController::class, 'updateadminProfile'])->name('updateAdminProfile');
// admin.changepassword
Route::get('admin/password', [MainAdminController::class, 'adminPasswordView'])->name('admin.changepassworde');
// update.Admin.password
Route::post('/admin/password/update', [MainAdminController::class, 'updateAdminPassword'])->name('update.Admin.password');
