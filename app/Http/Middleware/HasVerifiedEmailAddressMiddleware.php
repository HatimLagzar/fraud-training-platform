<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HasVerifiedEmailAddressMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->guard('web')->user();

        if ($user->hasVerifiedEmail() === false) {
            return redirect()
                ->route('verification.ask')
                ->with('error', 'Cannot access this page without verifying your email address.');
        }

        return $next($request);
    }
}
