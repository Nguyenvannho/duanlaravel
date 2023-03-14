<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $fillable= ['name','address','phone'];
    public function products(){
        return $this->belongsToMany(Product::class,'ordersdetail','order_id','product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
