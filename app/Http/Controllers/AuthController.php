<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerIndex() {
        return view('register');
    }

    public function loginIndex() {
        return view('login');
    }

    public function register(Request $request) {
        $request->validate([
            'login' => 'required|min:6|max:255|unique:users|regex:/^[A-Za-z0-9]+$/',
            'fio' => 'required|min:4|max:255|regex:/^[А-ЯЁа-яё\s]+$/u',
            'password' => 'required|min:8',
            'phone' => 'required|max:255|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'email' => 'required|email',
        ]);

        $user = User::create([
            'login' => $request->login,
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('apps');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('apps');
        }

        return back()->withErrors([
            'login' => 'Логин или пароль неверны!'
        ]);
    }
}
