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
        if($user && $user->hasSubscription) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        // $subscription = $user->subscription;
        // if ($subscription) {
        //     $endDate = $subscription->pivot->end_date;
        //     if ($endDate > now()) {
        //         return true;
        //     }
        // }

        return $next($request);
    }
}
