<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscriptio::all();

        return response()->json($subscriptions);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'user_id' => 'required|users:id',
            'subscription_level_id' => 'required|subscription_levels:id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $subscription = UserSubscription::create([
            $request->all()
        ]);

        return response()->json($subscription);
    }

    public function unsubscribe($id)
    {
        // there's no auto payment, so it expires on its own

        return response()->json(['message' => 'Subscription deleted']);
    }
}
