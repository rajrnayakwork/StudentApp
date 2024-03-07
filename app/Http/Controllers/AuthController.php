<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('login');
    }

    public function registration(){
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('registration');
    }

    public function store(Request $request){
        $request->validate([
            'role_type' => 'bail|required',
            'user_name' => 'bail|required|string|unique:users|max:250',
            'password' => 'bail|required|min:6|confirmed',
        ]);
        $user = new User;
        $user->role_type = $request->role_type;
        $user->user_name = $request->user_name;
        $user->password = $request->password;
        $user->student_id = null;
        $user->save();

        $credentials = $request->only('user_name','password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($user->role_type == 2) {
                return redirect()->route('user.index',[Auth::user()->student_id])->withSuccess('You have Successfully loggedin');
            }else{
                return redirect()->route('students.index')->withSuccess('You have Successfully loggedin');
            }
        }
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'user_name' => 'bail|required|string|max:250',
            'password' => 'bail|required|min:6',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_type == 2) {
                return redirect()->route('user.index',[Auth::user()->student_id])->withSuccess('You have Successfully loggedin');
            }else{
                return redirect()->route('students.index')->withSuccess('You have Successfully loggedin');
            }
        }else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
            Session()->flush();
            Session()->regenerate();
            return redirect()->route('login');
        }
        return redirect()->back();
    }
}
