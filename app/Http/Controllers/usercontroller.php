<?php

namespace App\Http\Controllers;

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
        $uri = request()->path();        
        return view("login", ["pagelogin" => $uri === "login"]);
    }
    public function SignIn(Request $request)
    {
        $request->validate
        (
            [
                "email" => 'required|unique:users',
                "name" => 'required|unique:users|max:255',
                "password" => 'required'
                ]
            );
        $email = $request->input("email");
        $name = $request->input("name");
        $password = $request->input("password");        
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'pegawai',
            'admin' => false
        ]);
        $request->session()->regenerate();
        return redirect("/login");
    }
    public function login(Request $request)
    {
        $creds = $request->only('name', 'password');

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect("/profile");
        }
        return back();
        
    }
    public function logout(Request $request)
    {
            $request->session()->flush();
            return redirect("http://127.0.0.1:8000/sign");
    }
    public function profiles()
    {
        $datausers = Auth::user();        
       $users = User::find(Auth::user()->getKey());
       $purchasedData = $users->purchased()->pluck("product_id");
       $products = productsmodel::find(1)->invoice;
        return view("profile",["datauser" => $datausers,"purchased"=> $purchasedData,"product"=>$products]);
    }
}
