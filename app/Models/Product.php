<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'type_id',
        'name',
        'description',
        'star',
        'price',
        'photo'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'id', 'product_id');
    }
}
