<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'amount', 'charge', 'final_amount', 'details',
        'status',  'mpesa_id', 'currency_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
