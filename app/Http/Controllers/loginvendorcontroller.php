<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginvendorcontroller extends Controller
{
    public function  getLogin(){

        return view('Vendor.auth.login');
    }
    function login(Request $request){
// dd(Auth::guard('admin')->user());
// $data = $reqet->validated();
// dd($request->all());

if (Auth:: attempt(['email' =>$request->email, 'password' => $request->password])){
   // dd(Auth::guard('Vendor')->user());
 return   redirect('/');

    }
}
}
