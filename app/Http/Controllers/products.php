<?php

namespace App\Http\Controllers;

use App\Models\productsmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class products extends Controller
{
    public function product(){
        $namauser = Auth::user()->name;
        $islogin = Auth::check();
        $allproduct = productsmodel::all();
        return view("products",["name" => $namauser,"login" => $islogin,"products"=> $allproduct]);
    }
}
