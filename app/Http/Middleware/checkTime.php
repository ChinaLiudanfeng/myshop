<?php

namespace App\Http\Middleware;

use Closure;

class checkTime
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
        $t = strtotime("now");
        $j = strtotime("00:00:00");
        $s = strtotime("23:00:00");
        if($j>$t || $t>$s){
            return redirect('admin/goodsList');
        }
        return $next($request);
    }
}
