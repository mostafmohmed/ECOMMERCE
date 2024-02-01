<?php

use App\Models\Lang;
use App\Models\laungue;
use Illuminate\Support\Facades\Config;



 

function get_default_lang(){
    return Config::get('app.locale')  ;
}
function get_languages(){

    return Lang:: get();
}
