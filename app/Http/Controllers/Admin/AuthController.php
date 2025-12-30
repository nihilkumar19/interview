<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(){
        return view('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect('/admin');
        }

        return back()->withErrors(['email'=>'Invalid admin credentials']);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
