<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 	'firstname', 	'lastname', 	'city', 	'phone' ,	'email', 	'pincode' ,	'status' 	,'user_id', 'total_price',	'massage'
    ];
    public function orderitem(){
        return $this->hasMany(OrderItem::class ,'order_id');
    }
  

}
