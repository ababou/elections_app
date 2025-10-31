<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOfficeOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $office = $request->route('office'); // Office object thanks to route model binding

        // تحقق أن المكتب تابع للمستخدم الحالي
        if (!$office || $office->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }




}
