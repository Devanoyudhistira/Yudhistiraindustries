<?php

namespace App\Http\Controllers;

use App\Models\invoicemodel;
use App\Models\productsmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $request->validate([
            "productname" => "min:8|required|max:20",
            "productprice" => "required|min:1|numeric",
            "productimage" => "required|image|max:10000"
        ],["productname.min" => "character cannot less than 8","productprice.min" => "the price was too cheap","productimage.max" => "image size was to big"]);      
      $forminput = $request->input();  
      $productimage = $request->file("productimage")->store("productimage","public");
       $createresult = productsmodel::create([
            "price" => (float)$forminput["productprice"],
            "productname" => $forminput["productname"],
            "seller_id" => Auth::user()->getkey(),
            "description" => $forminput["description"],    
            "image"        => $productimage
        ]);        
        if($createresult){
            return back()->with("success",$forminput["productname"] . " created succesfully");        
        };        
    }

    public function delete(Request $request){
        $productid = $request->input("productid");
        $productresult = productsmodel::findOrFail($productid);
        $filename = $productresult["image"];
        $productresult->destroy($productresult["id"]);
        Storage::disk("public")->delete($filename);
        // return dd([$productresult,$productid]);
        return back()->with("success",$productresult['productname'] . " delete success");
    }


    public function buyingproduct(Request $request)
    {
       $productid = $request->input("productId");
       $buyerid = $request->input("userid");
        invoicemodel::create([
            "product_id" => $productid,
            "buyer_id" => $buyerid,
        ]);
        return back()->with("success","purchase success");
    }
}
