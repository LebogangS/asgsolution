<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function index() {
        $title = "Login";
        return view('login',compact('title'));
    }  

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration() {
        $title = "Register";
        return view('registration',compact('title'));
    }

    public function registering(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $request['user_type'] = 'normal';
        $data = $request->all();
        $this->create($data);
          
        return redirect("/")->withSuccess('have registered');
    }

    public function create(array $data) {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'user_type' => $data['user_type'],
        'password' => Hash::make($data['password']),
      ]);
    }
 
    public function home() {
        return view('home');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('/');
    }
}
