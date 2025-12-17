<?php

use App\Http\Middleware\newsMaker;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Companyblogcontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\products;
use App\Http\Middleware\welcomemiddleware;
use App\Http\Middleware\loginpage;
use App\Http\Middleware\productsmiddleware;


Route::middleware(welcomemiddleware::class)->group(function () {
    Route::get('/', function (Request $request) {
        return view('Landing', ["login" => Auth::check()]);
    });
    Route::get('/sign', [usercontroller::class, "signinpage"]);
    Route::get('/login', [usercontroller::class, "loginpage"]);
});

Route::controller(usercontroller::class)->group(function () {
    Route::get('/userprofile/{id}', 'userprofile');
    Route::get('/logout', 'logout');
    Route::post('/signin', 'SignIn');
    Route::post('/loginpage', 'login');
    Route::get('/updateuser', 'updateview');
    Route::post('/updateprofile', 'updateuser');

    Route::middleware(loginpage::class)->group(function () {
        Route::get('/profile', 'profiles');
    });
});

Route::controller(Companyblogcontroller::class)->group(function () {
    Route::get('/news', 'companyblog');
    Route::get('/singlenews/{newsid}', 'singlenews');    
    Route::post('/postblog', 'postblog');
    Route::get('/makenews', 'makenews')->middleware(newsMaker::class);
});

Route::controller(products::class)->group(function () {
    Route::post('/deleteproduct', 'delete');
    Route::post('/product', 'createproduct');
    Route::post('/purchase', 'buyingproduct');    
    Route::get('/products', 'product');    
});
