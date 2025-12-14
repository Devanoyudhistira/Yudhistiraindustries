<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Companyblogmodel;
use Illuminate\Support\Facades\Auth;

class Companyblogcontroller extends Controller
{
    public function companyblog(Request $request){                
        
        $news = Companyblogmodel::with("author");        
        $searchresult = $request->input("search");
            if($searchresult != null){
                $news->where('title','like','%' .$searchresult . '%');
            };
            // dump($news->find(1)->author);
        return View("Companyblog",["datablogs" => $news->get(),"searchmode"=>$searchresult]) ;
    }
    public function singlenews(Request $request){ 
        $url = $request->newsid;
        $news = Companyblogmodel::find($url);                       
        return View("news",["news" => $news]);
    }
    public function postblog(Request $request){
       $input = $request->input();
       Companyblogmodel::create([
        "title" => $input["title"],
        "sender_id" => Auth::user()->getKey(),
        "blog" => $input["blog"]
       ]);
       return redirect("/news")->with("success","lets fu gooo");
    }
    public function deleteblog(Request $request){
       $input = $request->input();
       Companyblogmodel::destroy(1);

       return redirect("/companyblog");
    }
    public function makenews(){        
        return view("makenews");
    }
}
