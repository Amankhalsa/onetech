<?php

use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// HomeController
Route::get('/', [HomeController::class, 'index']);

Route::post('/newsletter', [HomeController::class, 'storenewsletter'])->name('store.newsletter');





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


// Admin ROutes 
Route::group(['prefix'=>'admin/category'],function(){

Route::get('view', [CategoryController::class, 'adminViewCategory'])->name('admin.viewCategory');
// store.category
Route::post('store', [CategoryController::class, 'adminStoreCategory'])->name('admin.store.category');
// deleteCategory
Route::get('delete/{id}', [CategoryController::class, 'adminDeleteCategory'])->name('deleteCategory');
// editCategory
Route::get('Edit/{id}', [CategoryController::class, 'adminEditCategory'])->name('editCategory');
// updateCategory
Route::post('update/{id}', [CategoryController::class, 'adminUpdateCategory'])->name('updateCategory');


});
//=========================================  viewSubCategory =========================================
Route::group(['prefix'=>'admin/Subcategory'],function(){

    Route::get('view', [SubcategoryController::class, 'ViewSubCategory'])->name('viewSubCategory');
    // // store.subcategory
    Route::post('store', [SubcategoryController::class, 'adminStoreSubCategory'])->name('store.subcategory');
    // // deleteSubcategory
    Route::get('delete/{id}', [SubcategoryController::class, 'deleteSubCategory'])->name('deleteSubcategory');
    // // editCategory
    Route::get('Edit/{id}', [SubcategoryController::class, 'editSubCategory'])->name('editSubCategory');
    // // update.subcategory
    Route::post('update/{id}', [SubcategoryController::class, 'updateSubCategory'])->name('update.subcategory');
    
    
    });
//=========================================  viewSubCategory =========================================

// ================================== Brands Routes & BrandController ================================

Route::group(['prefix'=>'admin/brands'],function(){

    Route::get('view', [BrandController::class, 'adminViewbrand'])->name('admin.viewbrands');
    // store.Brnad
    Route::post('store', [BrandController::class, 'adminStoreBrand'])->name('store.Brand');
    // // deleteBrand
    Route::get('delete/{id}', [BrandController::class, 'adminDeleteBrand'])->name('deleteBrand');
    // // editbrand
    Route::get('Edit/{id}', [BrandController::class, 'adminEditBrand'])->name('editbrand');
    // // updateCategory
    Route::post('update/{id}', [BrandController::class, 'adminUpdateBrand'])->name('updateBrand');
    
    
    });

    // ========================== admin coupon ===============================
Route::group(['prefix'=>'admin/coupon'],function(){
        Route::get('view', [CouponController::class, 'adminViewcoupon'])->name('admin.coupon');
        // // store.coupon
        Route::post('store', [CouponController::class, 'adminStorecoupon'])->name('store.coupon');
        // // // deleteBrand
        Route::get('delete/{id}', [CouponController::class, 'adminDeletecoupon'])->name('deletecoupon');
        // // // editcoupon
        Route::get('Edit/{id}', [CouponController::class, 'adminEditcoupon'])->name('editcoupon');
        // // // update.coupon
        Route::post('update/{id}', [CouponController::class, 'adminUpdatecoupon'])->name('update.coupon');


});

// admin.newsletter
    Route::group(['prefix'=>'admin/newsletter'],function(){
    // newsletter
    Route::get('view', [CouponController::class, 'ViewNewsletter'])->name('admin.newsletter');

    // deletenewsletter
    Route::get('delete/{id}', [CouponController::class, 'adminDeletenewsletter'])->name('deletenewsletter');

});

// ========================= Product All ROutes =================================
Route::group(['prefix'=>'admin/product'],function(){
    // all_Product
    Route::get('view', [ProductController::class, 'ViewProduct'])->name('all_Product');
    //  create_Product
    Route::get('Create', [ProductController::class, 'createProduct'])->name('create_Product');
    // For Show Sub category with ajax

    // store.product
    Route::post('store', [ProductController::class, 'storeProduct'])->name('store.product');


});
Route::get('get/subcategory/{category_id}', [ProductController::class, 'GetSubcat']);
// ========================= Product All ROutes =================================


