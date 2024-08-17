<?php 

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Portal;

trait SubdomainHandlerTrait
{
    /**
     * Extract the subdomain from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function getSubdomain(Request $request)
    {
        // Example: If the full URL is http://subdomain.example.com, this extracts "subdomain"
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0]; // Adjust this logic based on your subdomain structure

        return $subdomain;
    }

    /**
     * Get the user ID by the subdomain.
     *
     * @param  string  $subdomain
     * @return int|null
     */
    protected function getPortalIdBySubdomain($subdomain)
    {
        // Find the user associated with the given subdomain
        $user = User::where('subdomain', $subdomain)->first();

        // Find the portal associated with the user's ID
        $portal = Portal::where('user_id', $user?->id)->first();

        // Return the portal ID if found, or null if not
        return $portal ? $portal->id : null;
    }
}
