<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Main_Catagotiry extends Model  
{

    protected $table='main__catagotiries';
    protected $fillable = [
        'id' ,
        'active',	
        'translation_lang' ,
        	'name' 
            ,	
            'slog' 
            ,	
            'created_at',
             	'photo' ,
                'translation_of'
                ,	'direction' 
                ,
                	'updated_at' 	
    ];
    public function  scopeactive($query){
return $query->where('active',1);
    }
    // public function getSearchResult(): SearchResult
    // {
    //     $url = 'define your route here';

    //     return new SearchResult(
    //         $this,
    //         $this->name,
    //         $url
    //     );
    // }
    use HasFactory;
}
