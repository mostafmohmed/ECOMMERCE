<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout ;
class paypalcontroller extends Controller
{
    public function payment(){
        $data = [];

 $cart= Cart::where('userr_id',Auth::id())->get();
$prodectname=[];
$prodectprice=[];
$prodectqity=[];
$total=0;

foreach($cart as $v){
    $prodectname['name']=$v->protect->name;
    $prodectprice[]=$v->protect->price;
    $prodectqity['qty']=  $v->qua;
    $total=$total+$v->protect->price;
}

foreach($cart as$k=> $v){
    $data['items'][$k]=[
       
        
            'name' => $v->protect->name,
            'price' => $v->protect->price,
            'desc'  => 'Macbook pro 14 inch',
            'qty' => 1
        
        
    ] ;
  
}
//dd($total);
//  dd($data['items']);
  //dd($prodectqity['qty']);
    // $data['items']=[
       
    //     [
    //         'name' => "cccc",
    //         'price' => 100,
    //         'desc'  => 'Macbook pro 14 inch',
    //         'qty' => 1
    //     ]
        
    // ] ;
    $data['invoice_id'] = 11;
     $data['invoice_description'] = "Order #{$data['invoice_id']} Invoic";
    $data['return_url']=route('front.success');
    
    $data['cancel_url']=route('front.cancel');
    $data['total'] =  $total;
    $provider=new ExpressCheckout;
    // $response=$provider->setExpressCheckout($data);
    $response= $provider->setExpressCheckout($data,true);
    return redirect($response['paypal_link']);
    }
    public function cancel(){
        dd('iiiiiii');
    }
    public function success(Request $request){
        $provider=new ExpressCheckout;
        $response=$provider->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])){
            dd('sucesssssssssssssssssss');
        }
        dd("iiiiiiiiiiiiiiiii");
    }
    
}
