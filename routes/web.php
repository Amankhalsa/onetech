<?php

use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubcategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/ 

// Route::get('/', function () {
//     return view('welcome');
// });

// HomeController

Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [SocialiteController::class, 'handleCallback']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice'); 

Route::get('/', [HomeController::class, 'index']);

Route::post('order/tracking/', [HomeController::class, 'ordertracking'])->name('order.tracking');

Route::post('/newsletter', [HomeController::class, 'storenewsletter'])->name('store.newsletter');


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $notification = array(
        'message' => 'User login successfully',
        'alert-type' => 'success'
    );
    return view('user.index')->with($notification);
    
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
Route::get('/user/change-password/', [MainUserController::class, 'userPasswordView'])->name('user.changepassword');
// password.update
Route::post('/user/password/update', [MainUserController::class, 'userPasswordupdate'])->name('password.update');

//  add to wishlist 
Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'add_To_Wishlist'])->name('addToWishlist');

// CartController
Route::get('/add-to-cart/{id}', [CartController::class, 'add_To_cart']);
// check
Route::get('/check', [CartController::class, 'check']);

// show.cart
Route::get('show-cart', [CartController::class, 'showcart'])->name('show.cart');
// remove cart 

Route::get('remove-cart/{rowId}', [CartController::class, 'removecart'])->name('remove-cart');
// update.cartitem
Route::post('update-cart/', [CartController::class, 'updateCart'])->name('update.cartitem');

Route::get('cart/product/view/{id}', [CartController::class, 'viewproduct']);

Route::post('insert/intocart', [CartController::class, 'insertintocart'])->name('insert.into.cart');
// user.checkout
Route::get('user/checkout', [CartController::class, 'userCheckOut'])->name('user.checkout');
// user.wishlist
Route::get('user/wishlist', [CartController::class, 'userwishlist'])->name('user.wishlist');
// coupon.remove
Route::get('coupon/remove', [CartController::class, 'couponremove'])->name('coupon.remove');
// Payment 
Route::get('/payment/steps', [CartController::class, 'paymentpage'])->name('payment.step');
// payment.process

// product/search
Route::post('/product/search', [CartController::class, 'prodcut_search'])->name('product.search');


Route::post('/user/payment/process', [PaymentController::class, 'paymentProcess'])->name('payment.process');
// stripe.charge

Route::post('/user/stripe/charge', [PaymentController::class, 'stripecharge'])->name('stripe.charge');

Route::post('/oncash/charge', [PaymentController::class, 'oncashcharge'])->name('oncash.charge');


// success.orderlist
Route::get('/user/success/orderlist', [PaymentController::class, 'successOrderlist'])->name('success.orderlist');

// user.return.order
Route::get('/user/return/order/{id}', [PaymentController::class, 'userReturnOrder'])->name('user.return.order');


// apply.coupon
Route::post('/user-apply-coupon', [CartController::class, 'apply_coupon'])->name('apply.coupon');

Route::get('/product/details/{id}/{product_name}', [ProductDetailController::class, 'viewProductdetail'])->name('product_detail');
// addtoCart
Route::post('/add-to-cart/{id}', [ProductDetailController::class, 'addtoCartproduct'])->name('addtoCartproduct');




Route::get('/blog/post', [BlogController::class, 'addblogpost'])->name('blog.post');
// language.english
Route::get('/language/english', [BlogController::class, 'language_english'])->name('language.english');
Route::get('/language/hindi', [BlogController::class, 'language_hindi'])->name('language.hindi');
// continue.reading
Route::get('/continue/reading/{id}', [BlogController::class, 'continuereading'])->name('continue.reading');

// product detail page 

Route::get('/products/{id}', [ProductDetailController::class, 'productsView'])->name('products');

// allcategories
Route::get('/all-categories/{id}', [ProductDetailController::class, 'all_categories_view'])->name('allcategories');



Route::get('/contact/page', [ContactController::class, 'contact_page'])->name('contact.page');
Route::post('/contact/store', [ContactController::class, 'store_contact_msg'])->name('contact.form');




// admin.profile
Route::middleware(['auth:admin' ])->group(function(){
Route::get('admin/profile', [MainAdminController::class, 'adminProfile'])->name('admin.profile');
// edit.admin.profile
Route::get('edit/admin/profile', [MainAdminController::class, 'editadminProfile'])->name('edit.admin.profile');
// updateAdminProfile
Route::post('update/admin/profile', [MainAdminController::class, 'updateadminProfile'])->name('updateAdminProfile');
// admin.changepassword
Route::get('admin/password', [MainAdminController::class, 'adminPasswordView'])->name('admin.changepassworde');
// update.Admin.password
Route::post('/admin/password/update', [MainAdminController::class, 'updateAdminPassword'])->name('update.Admin.password');


Route::middleware(['access' ])->group(function(){
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
    Route::DELETE('/alldelete', [CouponController::class, 'allDelete'])->name('all.delete');
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
    // inactive.product
    Route::get('inactive/{id}', [ProductController::class, 'inactiveProduct'])->name('inactive.product');
    // active product
    Route::get('active/{id}', [ProductController::class, 'activeProduct'])->name('active product');
    // delete.product
    Route::get('delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
    // show.product
    Route::get('show/{id}', [ProductController::class, 'showProduct'])->name('show.product');
    // edit.product
    Route::get('edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    // update.product
    Route::post('update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');

    // update.product_image
    Route::post('update-image/{id}', [ProductController::class, 'updateProductImage'])->name('update.product_image');


});

Route::get('get/subcategory/{category_id}', [ProductController::class, 'GetSubcat']);
// ========================= Product All ROutes =================================
//============================= Admin Blog post routes ============================

Route::group(['prefix'=>'admin/blog'],function(){
    // admin.blogcategory
    Route::get('category-list', [PostController::class, 'blogCatList'])->name('blogcategory_list');
    // store.blogcategory
    Route::post('store-category', [PostController::class, 'storeblogCat'])->name('store.blogcategory');
    // deleteblogcat
    Route::get('delete-category/{id}', [PostController::class, 'deleteblogCat'])->name('delete_blog_cat');
    // edit_blog_cat
    Route::get('edit-category/{id}', [PostController::class, 'editBlogCat'])->name('edit_blog_cat');
    // update.blogcategory
    Route::post('update-category/{id}', [PostController::class, 'updateBlogCat'])->name('update.blogcategory');
    // add_Blog_Post
    Route::get('add-blog-post', [PostController::class, 'addBlogpost'])->name('add_Blog_Post');
    // store.blog_post
    Route::post('store-blog-post', [PostController::class, 'storeBlogpost'])->name('store.blog_post');
    // view blog 
    Route::get('view-blog-post', [PostController::class, 'viewBlogpost'])->name('view.blog_post');
    // edit.blogPost 
    Route::get('edit-blog-post/{id}', [PostController::class, 'editBlogpost'])->name('edit.blogPost');
    // delete.blogpost
    Route::get('delete-blog-post/{id}', [PostController::class, 'deleteBlogpost'])->name('delete.blogpost');
    // update.blog_post
    Route::post('update-blog-post/{id}', [PostController::class, 'updateBlogpost'])->name('update.blog_post');


    
});
// 

Route::group(['prefix'=>'admin'],function(){
    
    Route::get('pading/order/', [OrderController::class, 'NewOrder'])->name('admin.neworder');
    Route::get('pending/order/view/{id}', [OrderController::class, 'adminViewOrder'])->name('admin.view.order');
    Route::get('payment/accept/{id}', [OrderController::class, 'adminpaymentaccept'])->name('admin.payment.accept');
    Route::get('payment/cancel/{id}', [OrderController::class, 'adminpaymentcancel'])->name('admin.payment.cancel');
    Route::get('accept/payment', [OrderController::class, 'AcceptPayment'])->name('admin.accept.payment');

    Route::get('cancel/order', [OrderController::class, 'CancelOrder'])->name('admin.CancelOrder');
    Route::get('Process/Payment', [OrderController::class, 'ProcessPayment'])->name('admin.ProcessPayment');
    Route::get('Success/Payment', [OrderController::class, 'SuccessPayment'])->name('admin.SuccessPayment');
    Route::get('delevery/process/{id}', [OrderController::class, 'admindeleveryprocess'])->name('admin.delevery.process');

    Route::get('delevery/done/{id}', [OrderController::class, 'admindeleverydone'])->name('admin.delevery.done');

    Route::get('seo/', [OrderController::class, 'adminSeo'])->name('admin.seo');

    Route::post('seo/update/{id}', [OrderController::class, 'adminSeoUpdate'])->name('admin.seo.update');

});
Route::group(['prefix'=>'admin/orders'],function(){
    
// ReportController
Route::get('today/orders/', [ReportController::class, 'adminTodayOrder'])->name('admin.today.orders');
Route::get('today/delivery/', [ReportController::class, 'adminTodaydelivery'])->name('admin.today.delivery');

Route::get('this/month/', [ReportController::class, 'adminthismonth'])->name('admin.this.month');

Route::get('search/report/', [ReportController::class, 'adminSearchReport'])->name('admin.search.report');

Route::post('search/by-year/', [ReportController::class, 'searchByYearReport'])->name('search.by.year');


Route::post('search/by-month/', [ReportController::class, 'searchBymonthReport'])->name('search.by.month');
Route::post('search/by-date/', [ReportController::class, 'SearchByDate'])->name('search.by.date');


});
Route::group(['prefix'=>'admin/roles'],function(){
    Route::get('/roles', [UserRoleController::class, 'adminAllUserRole'])->name('admin_all_users');
    Route::get('/create', [UserRoleController::class, 'admincreateAdmin'])->name('admin_create_users');
    Route::post('/store', [UserRoleController::class, 'adminUserstore'])->name('store.admin');

    Route::get('/edit/{id}', [UserRoleController::class, 'adminedituser'])->name('admin_edit_users');
    Route::post('/update/{id}', [UserRoleController::class, 'adminupdateuser'])->name('update.adminrole');
    
    Route::get('/delete/{id}', [UserRoleController::class, 'admindeleteuser'])->name('admin_delete_users');

});
Route::group(['prefix'=>'admin/user'],function(){
    Route::get('/product/stock', [UserRoleController::class, 'ProductStock'])->name('admin.product.stock');
});
// admin.site.setting

Route::group(['prefix'=>'admin/site'],function(){
    Route::get('/setting', [SettingController::class, 'adminSiteSetting'])->name('admin.site.setting');
    Route::post('/setting-update/{id}', [SettingController::class, 'adminUpdateSetting'])->name('admin.update.sitesetting');

    

});


Route::group(['prefix'=>'admin/return'],function(){
    Route::get('/order', [ReturnController::class, 'adminReturnOrder'])->name('admin.return.order');
    Route::get('/return-order/{id}', [ReturnController::class, 'adminUpdateSetting'])->name('admin.approve.return');

    

});
Route::group(['prefix'=>'admin/messages'],function(){

Route::get('/all/view', [ContactController::class, 'all_contact_msg'])->name('contact.messages');

});
});

