<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table="admins";
    
    public function Produects(){
        return $this->belongsToMany(Produect::class,'impot__produects');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function whishHas($produect_id){
        return self::Produects()->where('produect_id',$produect_id)->exists();
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    use HasFactory;
}
