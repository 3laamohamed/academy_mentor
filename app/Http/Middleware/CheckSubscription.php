<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
                // dd(auth()->user());
        $subscription_date=Subscription::where('school_id',auth()->user()->school_id)->latest('created_at')->first()->expire_date;

        if(strtotime(date(today()))<$subscription_date){
        return $next($request);
    }else{
        return redirect(route('admin.subscription.purchase'));
    }
    }
}
