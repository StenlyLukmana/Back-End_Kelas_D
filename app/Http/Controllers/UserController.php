<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser (Request $request){
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        return redirect('/login');
    }

    public function register () {
        return view('register', ['title' => 'Register']);
    }

    public function login () {
        return view('login', ['title' => 'Login']);
    }

    public function authenticate (Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/view');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match'
        ])->onlyInput('email');

    }

    public function logout (Request $request) {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');
    }
}
