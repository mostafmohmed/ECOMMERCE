<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wshlist extends Model
{
    protected $fillable = [
        'user_id','produect_id'
    ];
    
    protected $table='wshlists';
    
    public function protect(){

       
        return $this->belongsTo(Produect::class,'produect_id','id');
    

}
    use HasFactory;
}
