<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   


public function handle($request, Closure $next, ...$roles)
{
    if (!auth()->check()) {
        // If the user is not authenticated, redirect to login
        return redirect('login');
    }

    $userRoles = auth()->user()->pluck('role')->toArray();

    foreach ($roles as $role) {
        if (in_array($role, $userRoles)) {
            return $next($request);
        }
    }

    // If none of the user's roles match any of the required roles, return 403 Forbidden error
    abort(403, 'Unauthorized action.');
}






}
