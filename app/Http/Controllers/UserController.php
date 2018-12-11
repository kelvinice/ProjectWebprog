<?php

namespace App\Http\Controllers;

use App\Popularity;
use App\Rules\AddressRule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function goProfile($id){
        $user = User::find($id);
        $plus = Popularity::where([['receiver',$id],['value',1]])->get()->count();
        $minus = Popularity::where([['receiver',$id],['value',-1]])->get()->count();
        return view('profile',compact('user','plus','minus'));
    }
    public function goUpdateProfile($id){
        $user = User::find($id);
        return view('editProfile',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => ['required', new AddressRule()],
            'birthday' => 'required|date|date_format:m/d/Y|before:12 years ago',
            'profile' => 'required|mimes:jpeg,jpg,png'
        ];

        $this->validate($request,$rules);

        $email = $request->email;

        $image = $request->file('profile');
        $name = $email.'.'.$image->getClientOriginalExtension();
        $dest = 'images/';
        $image->move($dest, $name);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(value($request->password));
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = date('Y-m-d', strtotime($request->birthday));
        $user->profile = $name;
        $user->role = $request->role;

        $user->save();
        return redirect('/');
    }
}
