<?php

namespace Armcanada\LaravelHoneypot\Http\Middleware;
use Closure;

class VerifyHoneypot
{
    public function handle($request, Closure $next, $honeypot = null)
    {
        if (! $request->isMethod('POST')) {
            return $next($request);
        }
        
        if ($honeypot) {
            if ($this->honeypotHasValue($request, $honeypot)) {
                return response('');
            }
        }
        return $next($request);
    }

    private function honeypotHasValue($request, $honeypot)
    {
        $value = $request->get($honeypot);
        return $value != '';
    }
}
