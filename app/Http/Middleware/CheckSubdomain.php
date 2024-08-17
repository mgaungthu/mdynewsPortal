<?php

namespace App\Http\Middleware;

use App\Traits\SubdomainHandlerTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubdomain
{
    use SubdomainHandlerTrait; // Import the trait

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the subdomain using the trait method
        $subdomain = $this->getSubdomain($request);

        // Check if the user's subdomain matches the requested subdomain
        if ($user && $user->subdomain !== $subdomain) {
            return response()->json(['error' => 'Unauthorized: Subdomain mismatch'], 403);
        }

        // If the subdomain matches, proceed with the request
        return $next($request);
    }
}

