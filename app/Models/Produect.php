<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produect extends Model
{
    protected $table='produects';
    
    public function Admin(){
        return $this->belongsToMany(Admin::class,'impot__produects');
    }
    
    use HasFactory;
}
