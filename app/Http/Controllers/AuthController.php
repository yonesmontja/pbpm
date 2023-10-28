<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
    	return view('auths.login');
    }
    public function reset()
    {
    	$remember_token = Str::random(60);
        return view('auth.passwords.reset',[
            'remember_token' => $remember_token,
        ]);
    }
    public function postlogin(Request $request)
    {
    	//return $request->all();
    	//dd($request->all());
        $email = $request -> email;
        $password = $request -> password;
        $role_siswa = 'siswa';
        $role_admin = 'admin';
        $role_guru = 'guru';
        $role_tu = 'tata_usaha';
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role_siswa])) {
            return redirect('/dashboard_siswa');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role_admin])) {
    		return redirect('/dashboard');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role_tu
        ])) {
            // dd(Auth::attempt([
            //     'email' => $email, 'password' => $password, 'role' => $role_tu
            // ]));
            return redirect('/dashboard');
        }
        //dd('yes');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role_guru])) {
            return redirect('/dashboard_guru');
        }
        return redirect('/login');
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
