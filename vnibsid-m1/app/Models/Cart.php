<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_basket',
        'id_product',
        'id_user',
        'count',
        'status',
    ];

    public function Product(){
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function User(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
