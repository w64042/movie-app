<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = 'users_subscriptions';
    protected $fillable = [
        'user_id',
        'subscription_level_id',
        'start_date',
        'end_date',
    ];

    public function subscriptionLevel()
    {
        return $this->belongsTo('App\Models\Subscription', 'subscription_level_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
