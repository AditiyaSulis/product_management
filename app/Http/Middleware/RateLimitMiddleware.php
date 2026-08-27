<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $limit = 1, $time = 5)
    {
        $key = 'rate_limit_' . $request->ip() . '_' . $request->path();
        
        $attempts = Cache::get($key, 0);
        
        if ($attempts >= $limit) {
            return response()->json([
                'message' => 'Too many requests. Please try again later.'
            ], 429);
        }
        
        Cache::put($key, $attempts + 1, $time);
        
        return $next($request);
    }
}
