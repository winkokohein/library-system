<?php

namespace Modules\Api\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;

class IsApiAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && $request->user()->isType(User::TYPE_ADMIN)) {
            return $next($request);
        }

        return response()->json(['message' => 'Forbidden. Admins only.'], 403);
    }
}
