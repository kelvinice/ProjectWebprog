<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cookie;
use Redirect;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function goLogin(){
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('auth.login');
        }
    }

    public function doLogout(){
        Auth::Logout();
        return redirect('/');
    }

    public function doLogin(Request $request){
        $rules  = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $this->validate($request,$rules);

        $email = $request->email;
        $password = $request->password;
        $rememberMe = $request->has('remember');
        Auth::attempt(['email' => $email,'password' => $password],$rememberMe);
        if($rememberMe){
            Cookie::forget('emailCookie');
            Cookie::forget('passwordCookie');
            Cookie::queue(Cookie::make('emailCookie', $email, 1000));
            Cookie::queue(Cookie::make('passwordCookie', $password, 1000));
        }

        if(Auth::check()){
            return redirect('/');
        }else{
            return Redirect::back()->withErrors(['login'=>'Email or Password false']);
        }
    }



}
