<?php

namespace App\Http\Controllers;

use App\Models\invoicemodel;
use App\Models\productsmodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


use Illuminate\Http\Request;

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
    public function SignIn(Request $request)
    {
        $request->validate
        (
            [
                "email" => 'required|unique:users',
                "name" => 'min:7|required|unique:users|max:255',
                "password" => 'required'
            ]
        );
        $email = $request->input("email");
        $name = $request->input("name");
        $image = $request->file("profileimage")->store("proflleimage", "public");
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
        return back()->withErrors(["password" => "opeartionfail"]);
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
        $userid = $request->is("id");
        $user = User::find($userid);
        $usersell = User::find($userid)->selled;
        $invoices = $user->purchased()->with('product')->get();
        $productprices = $invoices->pluck('product.price');
        $productimage = $invoices->pluck('product.image');
        $productdate = $invoices->pluck('product.created_at');
        return view("userprofile",["user" => $user]);
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
        // dd($productdate);
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

    public function updateuser(Request $request){
       $usertarget = User::find(Auth::user()->getKey());
    //    $input = $request->input();
      $updateresult = $usertarget->update(
        ['name' => "devanooo0000uuu",
            'email' => "nabihhjhla@gmail.com",
            'password' => "password",
            'admin' => false,
             "profileimage" => ""]
             // all this data was just a test on local and will be change after this
       );
       dd($updateresult);
    } 
    public function updateview(){
       return view("updateprofile");
    } 

}
