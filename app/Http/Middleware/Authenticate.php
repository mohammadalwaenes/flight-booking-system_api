<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // لا نعيد أي redirect، نتركه null
        return null;
    }

    protected function unauthenticated($request, array $guards)
    {
        // نعيد JSON بدلاً من redirect
        abort(response()->json(['message' => 'Unauthorized'], 401));
    }
}