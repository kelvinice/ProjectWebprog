<?php

namespace App\Http\Controllers;

use App\Rules\AddressRule;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
//
//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function goRegister(){
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('auth.register');
        }
    }

//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }

    public function doRegister(Request $request){
        $rules  = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => ['required', new AddressRule],
            'birthday' => 'required|date|date_format:m/d/Y|before:12 years ago',
            'agree' => 'accepted',
            'profile' => 'required|mimes:jpeg,jpg,png'
        ];

        $this->validate($request,$rules);

        $email = $request->email;

        $image = $request->file('profile');
        $name = $email.'.'.$image->getClientOriginalExtension();
        $dest = 'images/';
        $image->move($dest, $name);

//        $fileName = $email.'.'.request()->profile->getClientOriginalExtension();
//        $request->profile->storeAs('profile',$fileName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(value($request->password));
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = date('Y-m-d', strtotime($request->birthday));
        $user->profile = $name;

        $user->save();

        return redirect('/');
    }


}
