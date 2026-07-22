<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized.');
        }

        if (!$user->role) {
            abort(403, 'No role assigned.');
        }

        if (!in_array($user->role->name, $roles)) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}