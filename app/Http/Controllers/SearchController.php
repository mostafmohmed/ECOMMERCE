<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRquest;
use App\Mail\EmailDemo;
use App\Models\Main_Catagotiry;
use App\Models\Vendor;
use App\Notifications\vendorcreated;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Client\Request as ClientRequest;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $vendor = Vendor::
            with('category')
            ->get();
dd( $vendor->category());
        return view('admin.vendor.index', compact('vendor'));
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Vendor::class, 'name','email')
            ->registerModel(Main_Catagotiry::class,'name')
            ->perform($request->input('name'));
//dd( $searchResults[0]->searchable );
        return view('admin.vendor.index', compact('searchResults','request'));
    }
    function create(){
        return view('admin.vendor.create');
    }
    function store(Request  $re){
        
        $re['password']=Hash::make($re['password']);
      
 $create= Vendor::create($re->all());

 
 Notification::send($create, new vendorcreated($create));
// Mail::to("username@domain.com")->send(new EmailDemo($create));
// dd('jjjjjjjjj');
    }
    function edite($id){
        $vendor=Vendor::find($id);
        return view('admin.vendor.edite', compact('vendor'));
    }
    function update(Request  $re,string $id){
        $data = $re->except('_token','_method');
        
        Vendor::where('id',$id)->update($data);
        return redirect()->back()->with('success',' تم بنجاح تحديث القسم');
    }
}
