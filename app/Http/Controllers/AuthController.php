<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cookie;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // $remember = $request->has('remember') ? true : false;
        // dd($remember);
        // if (Auth()->attempt($credentials, $remember)) {
        //     $user = auth()->user;
        // } else {
        //     Toastr::error('fail, WRONG USERNAME OR PASSWORD');
        // }

        // cekLogin

        if (Auth::attempt($credentials)) {
            // cek user status = active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active!');
                return redirect('/login');
            }
            $request->session()->regenerate();
            if (Auth::user()->user_group_id == 1) {


                return redirect('ticket');
            } else {
                return redirect('ticket');
            }


            // if (Auth::user()->role_id == 1) {
            //     return redirect('ticket');
            // }
            // if (Auth::user()->role_id == 2) {
            //     return redirect('ticket');
            // }
        }


        Session::flash('status', 'failed');
        Session::flash('message', 'Wrong username/password');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
