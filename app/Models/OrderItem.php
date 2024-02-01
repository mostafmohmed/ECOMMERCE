<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable=[   'protect_id' 	,'order_id' ,	'price' 	];
    use HasFactory;
    public function protect():BelongsTo
    {
return $this->belongsTo(Produect::class,'protect_id');
    }
}
