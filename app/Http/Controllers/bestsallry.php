<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bestsallry extends Controller
{
    function bestsallry(){
        $topSellers = DB::table('product_skus')->join('produects', 'product_skus.prottect_id', '=', 'produects.id')
        ->orderBy('product_skus.prottect_id')
        ->limit(5)
        ->get()
        ->all();
return  $topSellers;
    }
  
    //
}
