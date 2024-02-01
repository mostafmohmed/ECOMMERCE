<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produect;
use App\Models\Wshlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistcontroller extends Controller
{
    public function wishlist(){
        $wishlist=Wshlist::where('user_id',Auth::id())->get();
        return view('front.wishlist',compact('wishlist'));
    }
    public function addfav(Request $request){
        $Product=Produect::find($request->prodect_id);
        if(Auth::check()){

if($Product){
    $userID=Auth::id();
   

    if(Wshlist::where('user_id',$userID)->where('produect_id',$request->input("prodect_id"))->exists()){
        return response()->json(['status'=>'oredy exit']);
    }
        $wishlist= new Wshlist();
        $wishlist->user_id=Auth::id();
        $wishlist->produect_id=$request->input("prodect_id");
        $wishlist->save();
    return response()->json(['status'=>'sucess']);
    
   
}else{
    return response()->json(['status'=>'priduect not found']);
}

        }
    }

}
