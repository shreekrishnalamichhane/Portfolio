<?php

namespace App\Http\Middleware;

use App\Support\Google2FAAuthenticator;
use Closure;

class LoginSecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authenticator = app(Google2FAAuthenticator::class)->boot($request);

        // If the user is already authenticated with the OTP
        if ($authenticator->isAuthenticated()) {
            // Allow the request
            return $next($request);
        }

        // If not, then ask for the OTP code.
        return $authenticator->makeRequestOneTimePasswordResponse();
    }
}
