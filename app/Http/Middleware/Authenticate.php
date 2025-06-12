<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next)
    {
        $request->headers->set("Accept", "application/json");
        return $next($request);
    }

    public function failedValidation(Validator $validator) {
    throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Validation errors',
        'data'      => $validator->errors()
    ]));
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            abort(401, 'Unauthorized');
        }

        return null;
    }


}
