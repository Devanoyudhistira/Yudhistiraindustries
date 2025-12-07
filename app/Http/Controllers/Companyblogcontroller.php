<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Companyblogmodel;

class Companyblogcontroller extends Controller
{
    public function companyblog(){
        return View("Companyblog",["datablogs" => Companyblogmodel::all()]) ;
    }
    public function singlenews(Request $request){ 
        $url = $request->newsid;
        $news = Companyblogmodel::find($url);       
        return View("news",["news" =>$news]) ;
    }
    public function postblog(Request $request){
       $input = $request->input();
       Companyblogmodel::create([
        "title" => $input["title"],
        "sender" => $input["sender"],
        "blog" => $input["blog"]
       ]);

       return redirect("/companyblog");
    }
    public function deleteblog(Request $request){
       $input = $request->input();
       Companyblogmodel::destroy(1);

       return redirect("/companyblog");
    }
}
