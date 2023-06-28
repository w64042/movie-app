<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'subscription_level_id',
    ];

    public function subscriptionLevel()
    {
        return $this->belongsTo('App\Models\Subscription', 'subscription_level_id', 'id');
    }
}
