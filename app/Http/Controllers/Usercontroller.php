<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    function index(){
        $oreder=Order::where('user_id',Auth::id())->get();
        
        $sum_price=Cart::where('userr_id',Auth::id())->sum('total-price');
        return view('frontt.orders',compact(['oreder','sum_price']));
    }
    function show($id){
        $oreder=Order::where('id',$id)->where('user_id',Auth::id())->first();
        // dd($oreder->orderitem);
        return view('frontt.orderdetiles',compact('oreder'));
    }
}
