<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    public function  getLogin(){

        return view('admin.auth.login');
    }
    function login(Request $request){
// dd(Auth::guard('admin')->user());
// $data = $reqet->validated();
// dd($request->all());


//  $password=  Hash::make($request->password) ;
// dd($password);
// dd($request->email);


// $gardes=['web','Vendor','admin'];
// foreach($gardes as $garde){
    if(Auth::guard('admin')-> attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('/admin/dashpord');
        //redirect()->route('major.index');
    // }
}
$t=User::where('email','mostafa@w.com')->where('password','1234')->get();
// $t =auth()->attempt(['email' =>'mostafa@w.com', 'password' => 1234]);
//  $r= Auth:: guard('Vendor')-> attempt(['email'=>$request->email, 'password' =>$password]);
//  dd($r);

   
       


}
}