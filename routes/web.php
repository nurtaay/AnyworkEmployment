c<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\VacancyController;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Adm\Comment2Controller;
use App\Http\Controllers\langController;
use App\Http\Controllers\Adm\TournomentController;
use App\Http\Controllers\WalletController;

Route::get('/',function(){
    return redirect()->route('posts.index');
});

        Route::get('lang/{lang}',[LangController::class, 'switchLang'])->name('switch.lang');

    Route::resource('posts',PostController::class);
    Route::get('posts/category/{category}',[PostController::class,'postsByCat'])->name('posts.category');

    Route::middleware('auth')->group(function(){
    Route::resource('/posts',PostController::class)->except('index','show');
    Route::resource('/resumes',ResumeController::class)->name('create','edit');
    Route::put('/shops/product', [PostController::class, 'product'])->name('posts.product');
    Route::get('/shops/product', [PostController::class, 'product'])->name('product');
    Route::get('/profile', [PostController::class, 'profile'])->name('user.profile');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::get('/wallet/create', [WalletController::class, 'create'])->name('wallet.create');
    Route::get('/wallet/{wallet}/edit', [WalletController::class, 'edit'])->name('wallet.edit');
    Route::put('/wallet/{wallet}', [WalletController::class, 'update'])->name('wallet.update');
    Route::post('/wallet/{wallet}', [WalletController::class, 'store'])->name('wallet.store');
    Route::delete('/wallet/{wallet}', [WalletController::class, 'destroy'])->name('wallet.destroy');

    Route::get('/posts/{user}/editprofile',[ PostController::class, 'editprofile'])->name('posts.edit.profile');
    Route::put('/profile/{user}',[PostController::class, 'updateprofile'])->name('posts.updateprofile');

    Route::put('/avatar/{user}', [PostController::class, 'avatar'])->name('avatar');
    Route::get('/posts/{post}/message', [PostController::class, 'message'])->name('posts.message');
    Route::post('/posts/message/{post}', [PostController::class, 'message_v'])->name('posts.all');
    Route::get('/posts.tindex', [PostController::class, 'tindex'])->name('posts.tindex');
    Route::post('/post/{post}/resumeresume', [PostController::class, 'addResume'])->name('post.resume');
    Route::get('/posts/{post}/resume', [PostController::class, 'viewResume'])->name('posts.otklik');

        Route::get('/cart', [PostController::class, 'cartIndex'])->name('cart.index');
        Route::post('posts/{post}/cart', [PostController::class, 'addCart'])->name('posts.cart');
        Route::post('/posts/{post}/uncart', [PostController::class, 'deleteCart'])->name('posts.uncart');
        Route::post('/cart', [PostController::class, 'buy'])->name('cart.buy');

        Route::get('/cart/cart', [PostController::class, 'cart'])->name('cart');
        Route::put('/cart{cart}/confirm', [PostController::class, 'confirm'])->name('cart.confirm');

        Route::post('/post/{post}/favourite',[PostController::class,'favourite'])->name('posts.favourite');
        Route::get('/post/favorites', [PostController::class, 'myFavourites'])->name('posts.allfavourite');

    Route::resource('/comments',CommentController::class)->only('store','destroy');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function(){
        Route::resource('/roles', RoleController::class);
        Route::resource('/vacancy', VacancyController::class);
        Route::resource('/admcomment',Comment2Controller::class);
        Route::resource('/tournoments', TournomentController::class);

        Route::get('/users',[UserController::class,'index'])->name('users.index');
        Route::get('/users/search',[UserController::class,'index'])->name('users.search');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');
    });
});
Route::get('/posts/vacancy/{vacancy}', [PostController::class, 'postsByCat'])->name('posts.vacancy');
Route::resource('posts',PostController::class)->only('index','show');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register',[RegisterController::class,'create'])->name('register.form');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/login',[LoginController::class,'create'])->name('login.form');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::resource('/resumes',ResumeController::class);
