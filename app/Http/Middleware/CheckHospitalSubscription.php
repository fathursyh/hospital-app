<?php

namespace App\Http\Middleware;

use App\AlertEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHospitalSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        // Check if user has hospital relation
        $hospital = $user->hospital ?? null;

        if (!$hospital || $hospital->subscription_status == 'inactive') {
            return redirect()->route('checkout')->with([
                'status' => AlertEnum::Info->value,
                'message' => 'Subscription is inactive.'
            ]);
        }
        return $next($request);
    }
}
