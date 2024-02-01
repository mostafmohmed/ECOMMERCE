<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produect;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutcontroller extends Controller
{
    function checkout(){

        $userID= Auth::id();
        $olp_cart= Cart::where('userr_id',$userID)->get();
        foreach($olp_cart as $item){
            // dd($item->qua);
            // dd(Produect::where('id',$item->produect_id)->where('qua','>=',$item->qua)->get());
            if(!Produect::where('id',$item->produect_id)->where('qua','>=',$item->qua)->exists()){
           $carts=     Cart::where('userr_id',$userID)->where('produect_id',$item->produect_id)->first();
           $carts->delete();
            }
        }
        $cart= Cart::where('userr_id',$userID)->get();
        return view('frontt.checkout',compact('cart'));
    }


    function palcher(Request $request){
        $cartitem=Cart::where('userr_id',Auth::id())->get();
        $total_price=0;
        foreach($cartitem as $item){
            $total_price= $total_price+$item->protect->price*$item->qua;
        }
        
        // return $request;
        Order::create([
            ...$request->all(),
         'user_id'=>Auth::id(),
         'pincode'=>round(1,99),
         'total_price'=>$total_price,
         'status'=>1,
         
        ]);
    
   


foreach($cartitem as $item){
    OrderItem::create(
        [
            'order_id'=>$item-> id,
            'protect_id'=>  $item-> produect_id,
            'price'=>$item->price,
            // 'price'=>$cartitem
        ]
        );
        $pro=Produect::where('id',$item->produect_id)->first();
      
        $pro->qua=$pro->qua-$item->qua;
        $pro->update();
}
// if(Auth::user()->adress1==null){
    
// }
$cartitems=Cart::where('userr_id',Auth::id())->get();
Cart::destroy($cartitems);
return "true";
    }
}
