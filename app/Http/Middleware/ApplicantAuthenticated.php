<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ApplicantAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( FacadesAuth::check() )
        {
            // if user is not admin take him to his dashboard
            if ( Auth::user()->isStudyCentre() ) {
                 return redirect(route('study-centre.dashboard'));
            }
            // allow admin to proceed with request
            else if ( Auth::user()->isAdmin() ) {
                return redirect(route('admin.dashboard'));
           }

            // allow admin to proceed with request
            else if( Auth::user()->isApplicant() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
        
    
    }
}
