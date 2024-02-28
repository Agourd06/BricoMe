<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        $user = auth()->user();
        if ($user->type === $type) {
            return $next($request);
        }
        return \response()->json([
            "is_valid" => false,
            'message' => 'You Do Not Have Permission To Access This Page'
        ]);
    }
}
