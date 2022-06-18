<?php

namespace App\Http\Middleware;

use Closure;

class FilteringMiddleware
{
    public function handle($request, Closure $next)
    {
        $request->merge(['filter[id]' => '6']);
        return $next($request);
    }
}
