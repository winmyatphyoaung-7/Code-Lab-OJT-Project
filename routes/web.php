<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\UCourseController;



Route::middleware('auth_back')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/login',[AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::post('/login',[AuthController::class, 'login'])->name('auth#login');

    Route::get('/register',[AuthController::class, 'registerPage'])->name('auth#registerPage');
    Route::post('/register',[AuthController::class, 'register'])->name('auth#register');

    Route::get('/user/verify/{token}',[AuthController::class,'verifyEmail'])->name('auth#verifyEmail');

    Route::get('/password/forget',[AuthController::class,'showForgetForm'])->name('forget#passwordForm');
    Route::post('/password/forget',[AuthController::class,'sendResetLink'])->name('forget#passwordLink');
    Route::get('/password/reset/{token}',[AuthController::class,'showResetForm'])->name('reset#passwordForm');
    Route::post('/password/reset',[AuthController::class,'resetPassword'])->name('reset#password');
});

Route::get('/logout',[AuthController::class,'logout'])->name('auth#logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'admin','middleware' => 'admin_auth'],function () {
        Route::get('/homePage',[AdminController::class,'homePage'])->name('admin#homePage');

        //category
        Route::get('/category/list',[CategoryController::class,'listPage'])->name('category#listPage');

        Route::get('category/create',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('category/create',[CategoryController::class,'create'])->name('category#create');

        Route::get('category/edit/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
        Route::put('category/edit/{id}',[CategoryController::class,'edit'])->name('category#edit');

        Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category#delete');

        //courses
        Route::get('/course/list',[CourseController::class,'listPage'])->name('course#listPage');

        Route::get('course/create',[CourseController::class,'createPage'])->name('course#createPage');
        Route::post('course/create',[CourseController::class,'create'])->name('course#create');

        Route::get('course/edit/{id}',[CourseController::class,'editPage'])->name('course#editPage');
        Route::put('course/edit/{id}',[CourseController::class,'edit'])->name('course#edit');

        Route::delete('course/delete/{id}',[CourseController::class,'delete'])->name('course#delete');

        //courses recommand
        Route::get('/course/recommend',[CourseController::class,'recommendPage'])->name('course#recommendPage');
        Route::post('/course/recommend/{id}',[CourseController::class,'recommend'])->name('course#recommend');

        //account profile
        Route::get('account/profile',[AdminController::class,'profilePage'])->name('admin#profilePage');
        Route::get('account/edit/confirm',[AdminController::class,'confirmPasswordPage'])->name('admin#confirmPasswordPage');
        Route::post('account/edit/confirm',[AdminController::class,'confirmPassword'])->name('admin#confirmPassword');
        Route::get('account/edit/profile',[AdminController::class,'editProfilePage'])->name('admin#editProfilePage');
        Route::post('account/edit/profile/{id}',[AdminController::class,'editProfile'])->name('admin#editProfile');

        //change password
        Route::get('account/change/password',[AdminController::class,'changePasswordPage'])->name('admin#changePasswordPage');
        Route::post('account/change/password',[AdminController::class,'changePassword'])->name('admin#changePassword');

        //admin list
        Route::get('/adminList',[AdminController::class,'adminListPage'])->name('admin#adminListPage');

        //userList
        Route::get('/userList',[AdminController::class,'userListPage'])->name('admin#userListPage');

        //change role
        Route::post('change/role/{id}',[AdminController::class,'changeRole'])->name('admin#changeRole');

        //contact lists
        Route::get('/contactList',[ContactController::class,'contactListPage'])->name('admin#contactListPage');
        Route::get('/contact/delete/{id}',[ContactController::class,'contactDelete'])->name('admin#contactDelete');

        //like list & comment list for each course
        Route::get('/course/like/{id}/list',[AdminController::class,'likeList'])->name('course#likeList');
        Route::get('/course/comment/{id}/list',[AdminController::class,'commentList'])->name('course#commentList');
        
    });

    Route::middleware('user_auth')->group(function () {
        Route::get('/user/homePage',[UserController::class,'homePage'])->name('user#homePage');
        Route::get('/user/category/{id}',[UserController::class,'categorySearch'])->name('category#search');

        //course
        Route::get('/user/course/detail/{id}',[UCourseController::class,'courseDetail'])->name('course#detail');
        Route::post('/user/course/like/{id}',[LikeController::class,'like'])->name('course#like');
        Route::post('/user/course/save/{id}',[LikeController::class,'save'])->name('course#save');

        //save page
        Route::get('/user/save/page',[UserController::class,'savePage'])->name('user#savePage');

        //cart page
        Route::get('/user/cart/page',[UserController::class,'cartPage'])->name('cart#page');
        Route::get('/user/add/cart/{id}',[CartController::class,'addCart'])->name('cart#add');
        Route::get('/user/remove/cart/{id}',[CartController::class,'removeCart'])->name('cart#remove');
        Route::get('/user/save_for_later/{id}',[CartController::class,'saveForLater'])->name('cart#saveForLater');
        Route::get('/user/remove/save_for_later/{id}',[CartController::class,'removeLaterCart'])->name('laterCart#remove');
        Route::get('/user/move_to_cart/{id}',[CartController::class,'moveToCart'])->name('cart#moveToCart');

        //profile
        Route::get('/user/profile/edit',[UserController::class,'profileEditPage'])->name('user#profileEditPage');
        Route::post('/user/profile/edit',[UserController::class,'profileEdit'])->name('user#profileEdit');

        //comment
        Route::post('/user/course/comment/{id}',[CommentController::class,'comment'])->name('course#comment');
        Route::get('/user/comment/delete/{id}',[CommentController::class,'delete'])->name('comment#delete');
        Route::post('/user/comment/update/{id}',[CommentController::class,'update'])->name('comment#update');

        //change password
        Route::get('user/change/password',[UserController::class,'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('user/change/password',[UserController::class,'changePassword'])->name('user#changePassword');


        //contact page
        Route::get('user/contact',[ContactController::class,'contactPage'])->name('user#contactPage');
        Route::post('user/contact',[ContactController::class,'contact'])->name('user#contact');

        //checkout
        Route::get('/user/course/checkout',[CartController::class,'checkout'])->name('course#checkout');

    });
});
