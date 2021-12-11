<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('blogs'));
        }

        return redirect(route("login"))->with('message','Login details are not valid');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect(route('home'));

    }
}
