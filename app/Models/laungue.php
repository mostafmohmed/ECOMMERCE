<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laungue extends Model
{
    protected $table='languages';
    protected $fillable = [
        'id' ,	
        'lacale' ,
        	'name' 
            ,	
            'active' 
            ,	
            'created_at',
             	'abbr' 
                ,	'direction' 
                ,
                	'updated_at' 	
    ];
    use HasFactory;
}
