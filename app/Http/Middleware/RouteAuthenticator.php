<?php
/**
 * Created by PhpStorm.
 * User: Ashar
 * Date: 4/6/2018
 * Time: 12:09 AM
 */


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RouteAuthenticator
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->route('user');
        if( Auth::check() && Auth::user()->id != $user->id) {
            // not eligible user to edit, so access is denied
            return redirect()->route('home')->withErrors([
                'message' => 'Dear User, you can only update your own profile'
            ]);
        }
        return $next($request);
    }
}