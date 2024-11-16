<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check()))
        {
            return redirect('panel/dashboard');
        }
        return view('auth.login');
    }

    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            return redirect('panel/dashboard'); 
        }
    else
        {
            return redirect()->back()->with('error', "Email ve parolu düzelt");
        }
    }
   public function logout()
   {
    Auth::logout();
    return redirect(url(''));
   }
}