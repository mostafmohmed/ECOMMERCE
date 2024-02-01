<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class authgithub extends Controller
{
    public function logingithup(){
        return Socialite::driver('github')->redirect();
    }
    public function redirect(){
        $usersocilate = Socialite::driver('github')->user();
        // dd($user);
    $user=    User::updateOrCreate([
            'provider_id'=>$usersocilate->getId(),
        ],[
            'name'=>$usersocilate->getName(),
            'email'=>$usersocilate->getEmail(),
        ]);
        Auth::login( $user,true);
        return redirect('/front');
       
    }
}
