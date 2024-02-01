<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\launguagecreate;
use App\Http\Requests\launguageupdate;
use App\Models\laungue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class launguecontroller extends Controller
{
    function index(){
        
        $launguages=laungue::paginate(10);
        return view('admin.launguages.index',compact('launguages'));
    }
    function create(launguagecreate $request){

         
        try{
            laungue::create($request->all());
            return redirect()->route('laungue.create')->with('success','تم بنجاح اضافة القسم');
        }
         
        catch (\Exception $e) {
             
            return redirect()->route('laungue.create')->with('error', $e->getMessage());
        }
    }
    function showform(){
        return view('admin.launguages.create');
    }
    function edite($id){
        $languag=laungue::find($id);

        if( empty($languag) ){
            redirect()->back()->with('error','هذة اللغة غير موجودة');
        }
        return view('admin.launguages.edite',compact('languag'));
    }
    
    function updata(launguageupdate $request,string $id){
        
        $data = $request->except('_token','_method');
        
        laungue::where('id',$id)->update($data);
        return redirect()->back()->with('success',' تم بنجاح تحديث القسم');
    }
}
