<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    public function orders(){
        return $this->hasMany(Order::class,'customer_id','id');
    }
}
