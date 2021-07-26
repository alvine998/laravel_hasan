<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $pgw = Auth::guard('pengguna')->user();
        $noneuser = Auth::guard('pengguna')->user(null);


        if ($pgw->roles == "Admin" ||  $pgw->roles == "Operational Manager" || $pgw->roles == "PPC" || $pgw->roles == "Produksi") 
        {
            if (!Auth::guard('pengguna')->check()) {
                return redirect('login_pengguna');
            }
            if ($pgw->roles == $role) {
                return $next($request);
            }
            return redirect()->route('login_pengguna')->with('error',"Kamu gak punya akses yaaa..");
        }
    }
}
