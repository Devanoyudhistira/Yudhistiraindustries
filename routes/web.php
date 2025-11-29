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

Route::get('/', function (Request $request) {
    $islogin = Auth::check();
    return view('Landing',["login" => $islogin]) ;
})->middleware([welcomemiddleware::class]) ;
Route::get('/keuangan', [FinancialController::class, "financial"]);
Route::get('/companyblog', [Companyblogcontroller::class, "companyblog"]);
Route::get('/sign', [usercontroller::class, "loginpage"]);
Route::get('/login', [usercontroller::class, "loginpage"]);
Route::post('/loginpage', [usercontroller::class, "login"]);
Route::get('/logout', [usercontroller::class, "logout"]);
Route::get('/profile', [usercontroller::class, "profiles"])->middleware(loginpage::class);
Route::post('/signin', [usercontroller::class, "SignIn"]);
Route::get("/products",[products::class,"product"]);
Route::post('/companyblog/postblog', action: [Companyblogcontroller::class,"postblog"]);
