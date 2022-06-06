<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login',
    
    [
        'title' => 'Login'
    ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username / Password Wrong!');

    }

     // Register
     public function register(){
        return view('auth.register',
        [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|min:8',
            'confirmation' => 'required|same:password',
       ]);

       $validatedData['password'] = Hash::make($validatedData['password']);

       User::create([
           'name' => $validatedData['name'],
           'email' => $validatedData['email'],
           'address' => $validatedData['address'],
           'password' => $validatedData['password'], 
       ]);
       return redirect('/login')->with('success', 'Registration Succesfully, Pls Login!');
       
    }

    //Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
