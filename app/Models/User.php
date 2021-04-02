<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username',
        'email', 'phone', 'country', 'password',
        'balance', 'active',  'package_status',
        'referer_id', 'status', 'video_expiry_on',
        'video_status', 'vid_balance', 'welcome_spin',
        'last_spin_at', 'trade_balance', 'trade_status',
        'vid_status', 'inactive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function mpesas()
    // {
    //     return $this->hasMany(Mpesa::class);
    // }
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
    public function vidsubs()
    {
        return $this->hasMany(Vidsub::class);
    }
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
    public function tradedrawals()
    {
        return $this->hasMany(Tradedrawal::class);
    }
    public function vidrawals()
    {
        return $this->hasMany(Vidrawal::class);
    }
    public function referals()
    {
        return $this->hasMany(Referal::class);
    }
    public function watches()
    {
        return $this->hasMany(Watch::class);
    }
    public function spinnings()
    {
        return $this->hasMany(Spinning::class);
    }
    // public function methods()
    // {
    //     return $this->hasMany(Method::class);
    // }
    public function blogpays()
    {
        return $this->hasMany(Blogpay::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    // public function userLogins()
    // {
    //     return $this->hasMany(UserLogin::class);
    // }
    //Get Active Users
    public function scopeActive()
    {
        return $this->where('status', 1);
    }
    //Get Banned Users
    public function scopeBanned()
    {
        return $this->where('status', 0);
    }
    //Get Verified Users
    public function scopeVerified()
    {
        return $this->where('email_verified', 1);
    }
    //Get Unverified Users
    public function scopeUnverified()
    {
        return $this->where('email_verified', 0);
    }
}
