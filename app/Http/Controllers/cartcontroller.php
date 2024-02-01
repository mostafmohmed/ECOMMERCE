<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Produect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use \Darryldecode\Cart as ee;
// use Darryldecode\Cart\Cart as tt;
// use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
// use Cartt;
class cartcontroller extends Controller
{
  function viewdelet($id){
   $cart= Cart::find($id);
 $cart->delete();
  

    return response()->json([

        'success' => 'Record deleted successfully!'.$id

    ]);
    // response()->json(['status'=>$request]);
  }
  function view(){
    $userID= Auth::id();
    $cart= Cart::where('userr_id',$userID)->get();
 return    view('frontt.cart',compact('cart'));
  }
    function get(Request $request){
      // dd($request);
      // return response()->json(['status'=>$request->input("prodect_id")]);
      $Product=Produect::find($request->prodect_id);
      $Productexata=Produect::where('id',$request->prodect_id)->exists();
        $userID= Auth::id();
        if($userID ){
if(Cart::where('userr_id',$userID)->where('produect_id',$request->input("prodect_id"))->exists()){
  return response()->json(['status'=>"alread add card"]);
}else{
  $cart=new Cart();
  $cart->protect_name= $Product->name;
  $cart->price=$Product->price;
  $cart->qua=$request->prodect_qty;
  // qua
  $cart->produect_id =$request->prodect_id;
  
  $cart->userr_id=$userID;
  $cart->save();
  return response()->json(['status'=>" add card sucess"]);
}


//  $cart= Cart::where('userr_id',$userID)->get();
//  return    view('frontt.cart',compact('cart'));
//return the cart page

        }
        // dd($userID);



        }

// $Product = Produect::findOrFail([2]);
// foreach($Product as $Products )
// FacadesCart::add( 
//     $Products->id, $Products->name,3,  $Products->price,
// );
//  $g= FacadesCart::content();
//   $r= $g->count();
// dd($g);
// foreach($Product as $k => $v)
// {
//     // session()->put('carts',$v);
//   $ee=  array(
//         'id' => 2,
//         'name' => $v->name,
//         'price' => $v->price,
//         'quantity' => 4,
//         'attributes' => array(),
//         'associatedModel' => $Product,
//     );

// };
//  $i= \Cartt::session(1)->add($ee);
// $i =  \Cartt:: getContent();
// dd($i);

//dd($Product);

// $d= \Cart::  add( 
   
// array(
    
//     $Product->id,
//     // 'id' => 2,
//     $Product->name,
//      $Product->price,
// )
    
        
        
        

   
// );
// $items = \Cart:: getContent();
// dd($items);
// $card_prodects=[];
//  $card_prodects[]=$Product;

// // // session()->put('carts',$Product);
// // // $E= session('carts');
// // // dd($E);
// // session()->get('carts',[]);
// foreach($card_prodects as $k => $v)
// {
//     // session()->put('carts',$v);
//   $ee=  array(
//         'id' => 2,
//         'name' => $v->name,
//         'price' => $v->price,
//         'quantity' => 4,
//         'attributes' => array(),
//         'associatedModel' => $Product,
//     );

// };

// //dd($r);
// //dd( $card_prodects);

// //foreach($card_prodects as $k => $v)
// //{

// //};
 
// //$items = \Darryldecode\Cart\Facades\CartFacade::getContent();

// $list=[];
// $lis[]=$items;
// dd($lis);

//     }
    // function update(){
    //     \Cart::session($userID)->update($rowId,[
    //         'quantity' => 2,
    //         'price' => 98.67
    //     ]);
    // }
}
