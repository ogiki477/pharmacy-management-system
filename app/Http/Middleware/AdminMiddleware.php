<?php 

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(FacadesAuth::check()) {
                if(FacadesAuth::user()->is_role == 1) {
                    return $next($request);
                }else{
                    FacadesAuth::logout();
                    return redirect(url('/'));
                }
            }else {
                FacadesAuth::logout();
                return redirect(url('/'));

            }
            
        }
}

?>