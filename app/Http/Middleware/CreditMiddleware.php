<?php

namespace App\Http\Middleware;

use App\Models\Credit;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class CreditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $credit = Credit::where('user_id',  $request->user()->id)
                ->where('amount', '>', 0)
                ->first();
        if($credit) {
            return $next($request);
        }
        // Session::flash('error', 'You do not have enough credit.');
        Alert::html('error', 'Insufficient Credit, please check your credits');

        return redirect(RouteServiceProvider::HOME);
    }
}
