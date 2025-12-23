<?php

namespace App\Http\Controllers;

use App\Models\invoicemodel;
use App\Models\productsmodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\httpUploader;

class usercontroller extends Controller
{
    public function users()
    {
        return view("users");
    }
    public function loginpage(Request $request)
    {
        return view("login", ["pagelogin"]);
    }
    public function signinpage(Request $request)
    {        
        return view("signin");
    }
    public function SignIn(Request $request, httpUploader $httpUploader)
    {
        $request->validate
        (
            [
                "email" => 'bail|required|unique:users',
                "name" => 'min:8|required|unique:users|max:25',
                "password" => 'required|min:8',
                "profileimage" => "image|max:10240"
            ],
            [
                "email.unique" => "the user is already exist",
                "email.required" => "the email is missing",
                "name.required" => "the username is missing",
                "name.min" => "the username must more than 8",
                "name.max" => "the username must less than 25",
                "name.unique" => "the username is already used",
                "password.required" => "the password is missing",
                "password.min" => "the password is must more than 8 character",
                "profileimage.image" => "file is not an image (jpg,png)",
                "profileimage.max" => "image size must less than 10 mb",
            ]
        );
        $email = $request->input("email");
        $name = $request->input("name");
        if ($request->hasFile('profileimage')) {
            $image = $request->file('profileimage');
            $image = $httpUploader->uploadfile($image, "profileimage/");
        } else {
            $image = null;
        }
        $password = $request->input("password");
        $createuser = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'admin' => false,
            "profileimage" => $image
        ]);
        if ($createuser) {
            Auth::login($createuser);
            $request->session()->regenerate();
            return redirect("/profile");
        }
        ;
        return back()->withErrors(["password" => "operation fail"]);
    }
    public function login(Request $request)
    {
        $creds = $request->only('name', 'password');

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect("/profile");
        }
        return back()->withErrors(["password" => "login fail try again"]);

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("http://127.0.0.1:8000/sign");
    }
    public function userprofile(Request $request)
    {
        $userid = $request["id"];
        $user = User::find($userid);
        $usersell = User::find($userid)->selled;
        $invoices = $user->purchased()->with('product')->get();
        $products = $invoices->pluck('product.productname');
        $productprices = $invoices->pluck('product.price');
        $productimage = $invoices->pluck('product.image');
        $productdate = $invoices->all();
        return view("userprofile", [
            "datauser" => $user,
            "purchased" => $invoices,
            "products" => $products,
            "productprice" => $productprices,
            "productimage" => $productimage,
            "seller" => $usersell,
            "purchasedate" => $productdate,
        ]);
    }
    public function profiles()
    {
        $user = Auth::user();
        $invoices = $user->purchased()->with('product')->get();
        $seller = User::find($user["user_id"])->selled;
        // $selling = productsmodel::find("1")->selling;
        $products = $invoices->pluck('product.productname');
        $productprices = $invoices->pluck('product.price');
        $productimage = $invoices->pluck('product.image');
        $productdate = $invoices->all();
        // dd($productprices);
        return view("profile", [
            "datauser" => $user,
            "purchased" => $invoices,
            "products" => $products,
            "productprice" => $productprices,
            "productimage" => $productimage,
            "seller" => $seller,
            "purchasedate" => $productdate,
        ]);
    }

    public function updateuser(Request $request, httpUploader $httpUploader)
    {
        $newinput = $request->input();
        $request->validate
        (
            [
                "newname" => 'bail|min:8|required|unique:users,name|max:25',
                "newimage" => "required|image|max:10000"
            ],
            [
                "newname.required" => "the username is missing",
                "newname.min" => "the username must more than 8",
                "newname.max" => "the username must less than 25",
                "newname.unique" => "the username is already used",
            ]
        );
        $usertarget = User::find(Auth::user()->getKey());
        $previusimage = $usertarget["profileimage"] ?? "";
        Storage::disk("public")->delete($previusimage);
        $newimage = $request->file("newimage");
        $image = $httpUploader->uploadfile($newimage, "profileimage/");
        $usertarget->update(
            [
                'name' => $newinput["newname"],
                "profileimage" => $image
            ]
        );
        return redirect("profile")->with("success", "profile has been updated");
    }

}
