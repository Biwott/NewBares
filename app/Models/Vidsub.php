<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidsub extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'vidpack_id',  'status', 'expiry_on'
    ];
    public function vidpack()
    {
        return $this->belongsTo('App\Models\Vidpack');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
