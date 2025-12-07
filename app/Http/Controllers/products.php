<?php

namespace App\Http\Controllers;

use App\Models\invoicemodel;
use App\Models\productsmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class products extends Controller
{
    public function product()
    {
        $namauser = Auth::user()->name;
        $islogin = Auth::check();
        $allproduct = productsmodel::with('seller')->get();
        return view("products", ["name" => $namauser, "login" => $islogin, "products" => $allproduct]);
    }
    public function createproduct(Request $request)
    {
       $forminput = $request->input();  
      $productimage = $request->file("productimage")->store("productimage","public");
        productsmodel::create([
            "price" => (float)$forminput["productprice"],
            "productname" => $forminput["productname"],
            "seller_id" => Auth::user()->getkey(),
            "description" => $forminput["description"],    
            "image"        => $productimage
        ]);              
        return redirect("/profile");        
    }
    public function buyingproduct(Request $request)
    {
       $productid = $request->input("productId");
       $buyerid = $request->input("userid");
        invoicemodel::create([
            "product_id" => $productid,
            "buyer_id" => $buyerid,
        ]);
        return response()->json([
            "status" => "success",
            "received" => [
                "product" => $productid,
                "buyer"  => $buyerid
            ]
        ]);
    }
}
