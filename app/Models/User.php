<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, \Illuminate\Auth\Passwords\CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the lists for the user.
     */

    public function lists()
    {
        return $this->hasMany('App\Models\Lists\List');
    }

    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription');
    }

    // check if user has a subscription, check end date
    public function hasSubscription()
    {
        $subscription = $this->subscription;
        if ($subscription) {
            $endDate = $subscription->pivot->end_date;
            if ($endDate > now()) {
                return true;
            }
        }
        return false;
    }
}
