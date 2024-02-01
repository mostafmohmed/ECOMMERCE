<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Produect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class produectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produect=Produect::where('active',1)->get();
        return view('admin.produect.index',compact('produect'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $oo=Hash::make('mostafa');
        // $r=Admin::create([
        //     'email'=>'osamda@mohmed.com',
        //     'password'=>$oo,
        //     'name'=>'ahmed',
        // ]);
        // dd('jjjjjjjjjj');
        // $p=Produect::find($id);
        // // ;
        // dd($p->Admin());

        // $p=Admin::with('Produects')->get();
        // dd($p);
   //    dd($p->Admin()->parent)  ;

$idd  = auth()->guard('admin')->user()->id;
//auth()->guard('admin')->user()-
//  $r=Produect::join('impot__produects','impot__produects.produect_id','=','Produects.id')->
//  where('impot__produects.produect_id',$id) ->where('impot__produects.admin_id',$idd)-> get();
  $t= Admin::where('id',$idd)-> first()->Produects()->where('produect_id',$id)->exists() ;

 
if(  ! $t)
{
    Admin::where('id',$idd)-> first()->Produects()->attach( $id);
    $y= Admin::where('id',$idd)-> first()->Produects()->get();
 dd($y);
}
   dd('kkk');   
       // auth()->guard('admin')->user()->Produects()->attach( 2);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('jjjj');
        $idd  = auth()->guard('admin')->user()->id;
        $t= Admin::where('id',$idd)-> first()->Produects()->where('produects',$id)->detach();
        $t->delete();
        dd('nnnnnnnnnnnnn');
    }
}
