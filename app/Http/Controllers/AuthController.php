<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->back();
        }else{
            return view('login');
        }
    }

    public function registration(){
        if(Auth::check()){
            return redirect()->back();
        }else{
            return view('registration');
        }
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'bail|required|string|max:250',
            'email' => 'bail|required|email|unique:users|max:250',
            'password' => 'bail|required|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/students')->withSuccess('You have Successfully loggedin');
        }
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'email' => 'bail|required|email|max:250',
            'password' => 'bail|required|min:8',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('students.index')->withSuccess('You have Successfully loggedin');
        }else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout(){
        Auth::logout();
        Session()->flush();
        Session()->regenerate();
        return redirect()->route('login');
    }
}
