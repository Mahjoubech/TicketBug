<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function store(){
        //validation
        //create user
        //redrect

        $validated = request()->validate([
              'frst_name' => 'required|min:3|max:15',
              'last_name' => 'required|min:3|max:15',
              'email' => 'required|email|unique:users,email',
              'phone' => 'required|regex:/^[0-9+\-\s]+$/|min:8|max:15',
              'role_id' => 'required|in:client,developer,admin',
              'password' => 'required|confirmed|min:8',


        ]);
        dd($validated['role']);
           $fullname = $validated['frst_name']. ' ' . $validated['last_name'];
           $user = User::create([
            'name' => $fullname,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role_id' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);
        // Mail::to(request()->user()->email)->send(new WelcomeEmail(request()->user()));
        return redirect()->route('login')->with('success','Account created Successfuly !!');
    }
    public function authenticate(){
        dd(request()->all());
        $validated = request()->validate([
              'email' => 'required|email',
              'password' => 'required|min:8',

        ]);
        if(Auth :: attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('qstHome')->with('success',' login in Successfuly !!');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password'
        ]);
    }
    public function logout(){
        Auth :: logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('qstHome')->with('success','u are logout from swlni ');
    }
}
