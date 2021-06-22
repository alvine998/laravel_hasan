<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;    
// use App\Models\tb_pengguna;

class logincontroller extends Controller
{
    public function showFormLogin()
    {
        if ($user = Auth::guard('customtable')->user()) {
            if ($user->roles == 'Admin') {
                return redirect()->intended('pages.dashboard');
            } 
        }
        return view('pages.login');
    }
  
    public function masuk(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::guard('customtable')->attempt($kredensil)) {
                $user = Auth::guard('customtable')->user();
                if ($user->roles == 'Admin') {
                    return redirect()->intended('pages.dashboard');
                }
                return redirect()->intended('/');
            }

        return redirect()->route('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
   

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('home');
    }
  

}