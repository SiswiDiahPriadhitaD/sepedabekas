<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'date_payment',
        'pay',
        'status'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
    }
}
