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
        $login =Auth::check();
        $namauser = !$login ?  "" : Auth::user()->name;
        $islogin = Auth::check();
        $allproduct = productsmodel::with('seller')->get();        
        return view("products", ["name" => $namauser, "login" => $islogin, "products" => $allproduct]);
    }
    public function createproduct(Request $request,httpUploader $httpUploader)
    {  
        $request->validate([
            "productname" => "bail|min:8|required|max:20",
            "productprice" => "bail|required|min:1|numeric",
            "productimage" => "bail|required|image|max:10000"
        ],[
        "productname.min" => "product name cannot less than 8",
        "productname.required" => "product name was missing",
        "productname.max" => "product name cannot be more than 20",
        "productprice.min" => "the price was too cheap",
        "productprice.required" => "the price was missing",
        "productprice.numeric" => "please enter with number",
        "productimage.max" => "image size was to big",
        "productimage.image" => "please enter a proper image (jpg,png)",
        "productimage.required" => "image was missing"
    ]);      
      $forminput = $request->input();
      $description = $forminput["description"] ?? $forminput["description_pc"];
      $productimage = $request->file("productimage");
      $image = $httpUploader->uploadfile($productimage,"productimage/");
       $createresult = productsmodel::create([
            "price" => (float)$forminput["productprice"],
            "productname" => $forminput["productname"],
            "seller_id" => Auth::user()->getkey(),
            "description" => $description,    
            "image"        => $image
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
        invoicemodel::create([
            "product_id" => $productid,
            "buyer_id" => Auth::user()->getkey(),
        ]);
        return back()->with("success","purchase success");
    }
}
