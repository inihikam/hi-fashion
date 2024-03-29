<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'users_id',
        'insurance_price',
        'tax_price',
        'total_price',
        'total_pay',
        'transaction_status',
        'code'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
