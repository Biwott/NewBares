<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forex extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type', 'cost', 'amount', 'result', 'trade_open', 'trade_close','status', 'pair_id', 'tradepack_id',
    ];

    public function tradepack()
    {
        return $this->belongsTo('App\Models\Tradepack');
    }

    public function pair()
    {
        return $this->belongsTo('App\Models\Pair');
    }
}
