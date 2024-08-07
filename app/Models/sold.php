<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sold extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'clean',
        'price_at',
        'piece',
    ];

    public function cashier(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function one_store(){
        return $this->hasOne('App\Models\store','id','store_id');
    }

}
