<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function registration(){
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
            return redirect()->intended('/students')->withSuccess('You have Successfully loggedin');
        }
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'user_name' => 'bail|required|string|max:250',
            'password' => 'bail|required|min:6',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role_type;
            if ($role == 2) {
                return redirect()->route('students.index')->withSuccess('You have Successfully loggedin');
            }else{
                return redirect()->route('subjects.index')->withSuccess('You have Successfully loggedin');
            }
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
