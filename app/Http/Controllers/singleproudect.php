<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produect;
use Illuminate\Http\Request;

class singleproudect extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $protect=Produect::find($id);
        return view('frontt.single-protect',compact('protect'));
    }
}
