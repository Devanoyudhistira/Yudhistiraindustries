<?php

use App\Http\Controllers\Companyblogcontroller;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\products;
use App\Http\Controllers\usercontroller;
use App\Http\Middleware\loginpage;
use App\Http\Middleware\welcomemiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\productsmiddleware;

Route::get('/', function (Request $request) {
    $islogin = Auth::check();
    return view('Landing',["login" => $islogin]) ;
})->middleware(welcomemiddleware::class) ;
Route::get('/singlenews/{newsid}', [Companyblogcontroller::class, "singlenews"]);
Route::get('/news', [Companyblogcontroller::class, "companyblog"]);
Route::get('/sign', [usercontroller::class, "loginpage"])->middleware(welcomemiddleware::class);
Route::get('/login', [usercontroller::class, "loginpage"])->middleware(welcomemiddleware::class);
Route::post('/loginpage', [usercontroller::class, "login"]);
Route::get('/logout', [usercontroller::class, "logout"]);
Route::get('/profile', [usercontroller::class, "profiles"])->middleware(loginpage::class);
Route::post('/signin', [usercontroller::class, "SignIn"]);
Route::get("/products",[products::class,"product"])->middleware(productsmiddleware::class) ;
Route::post('/companyblog/postblog', action: [Companyblogcontroller::class,"postblog"]);
Route::post('/product', action: [products::class,"createproduct"]);
Route::post('/purchase', action: [products::class,"buyingproduct"]);

