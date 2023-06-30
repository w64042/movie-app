<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActiveSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $subscription = $user->subscription;

        if (!isset($subscription)) {
            return response()->json(['error' => 'Unactive subscription', 'subscription' => null], 403);
        } else {
            $endDate = $subscription->pivot->pluck('end_date')->orderBy('id', 'DESC')->first();

            if (isset($endDate) && $endDate < now()) {
                return response()->json(['error' => 'Unactive subscription', 'subscription' => $subscription], 403);
            }
        }

        return $next($request);
    }
}
