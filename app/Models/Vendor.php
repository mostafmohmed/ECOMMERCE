<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable implements Searchable
{use HasFactory;
   
     public function category()
    {
        return $this->belongsTo(Main_Catagotiry::class);
    }
    protected $fillable = [
        'latitude', 'longitude', 'name', 'mobile', 'password', 'address', 'email', 'logo', 'category_id', 'active', 'created_at', 'updated_at'
    ];
    public function getSearchResult(): SearchResult
    {
        $url = 'define your route here';

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

}
