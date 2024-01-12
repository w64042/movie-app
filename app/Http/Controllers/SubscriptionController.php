<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return response()->json($subscriptions);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'subscription_level_id' => 'required|exists:subscription_levels,id',
        ]);

        $subscription = UserSubscription::create([
            'user_id' => $user->id,
            'subscription_level_id' => $request->subscription_level_id,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime('+30 days')),
        ]);

        return response()->json($subscription);
    }

    public function unsubscribe()
    {
        // there's no auto payment, so it expires on its own
        return response()->json(['message' => 'Subscription deleted']);
    }
}
