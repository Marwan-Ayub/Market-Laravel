<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'supplier_id',
        'count',
        'price',
        'expire_date',
        'is_debt',
        'type',
    ];

    public function one_supplier(){
        return $this->hasOne('App\Models\supplier','id','supplier_id');
    }
}
