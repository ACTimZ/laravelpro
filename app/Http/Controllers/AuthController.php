<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function login_post(Request $request) {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('apps');
        }

        return back()->withErrors([
            'login' => 'Неверный пароль или логин'
        ]);
    }

    public function register() {
        return view('register');
    }

    public function register_post(Request $request) {
        $request->validate([
            'login' => 'required|min:6|unique:users|regex:/^[A-Za-z0-9]+$/',
            'phone' => 'required|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'fio' => 'required|min:5|regex:/^[А-ЯЁа-яё\s]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'login' => $request->login,
            'phone' => $request->phone,
            'fio' => $request->fio,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('apps');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
