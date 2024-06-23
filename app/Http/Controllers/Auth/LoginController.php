<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login.form');
    }

    public function store(Request $request){
        
        $formData = $request->only('email','password');

        if(Auth::attempt($formData)){
            return redirect()->intended('/');
        }else{
            return redirect()->route('login')->withErrors(['invalid login']);
        }

    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

}
