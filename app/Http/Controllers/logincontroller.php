<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\tb_pengguna;

class logincontroller extends Controller
{

    public function showFormLogin()
    {
        if ($user = Auth::guard('pengguna')->user()) {
            if ($user->roles == 'Admin') {
                return redirect()->intended('/admin');
            } elseif ($user->roles == 'Operational Manager') {
                return redirect()->intended('/operational-manager');
            }elseif ($user->roles == 'PPC') {
                return redirect()->intended('/ppc');
            }elseif ($user->roles == 'Produksi') {
                return redirect()->intended('/produksi');
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

            if (Auth::guard('pengguna')->attempt($kredensil)) {
                $user = Auth::guard('pengguna')->user();
                if ($user->roles == 'Admin') {
                    return redirect()->route('dashboard');
                }elseif ($user->roles == 'Operational Manager') {
                    return redirect()->route('dashboard-op');
                }elseif ($user->roles == 'PPC') {
                    return redirect()->route('dashboard-ppc');
                }elseif ($user->roles == 'Produksi') {
                    return redirect()->route('dashboard-produksi');
                }
                return redirect()->intended('/');
            }

        return redirect()->route('login_pengguna')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'Data yang anda masukan tidak terdaftar.']);

    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::guard('pengguna')->logout(); // menghapus session yang aktif`
        return redirect('/');
    }


}

