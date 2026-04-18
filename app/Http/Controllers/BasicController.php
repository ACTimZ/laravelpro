<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class BasicController extends Controller
{
    public function index() {
        return view('home');
    }

    public function appsIndex() {
        $applications = Application::where('user_id', Auth::user()->id)->get();
        return view('apps', compact('applications'));
    }

    public function apps() {
        return view('create-apps');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


    public function appsStore(Request $request) {
        $request->validate([
            'course_name' => 'required|min:6|max:255',
            'date' => 'required',
            'payment' => 'required|in:cash,transfit',
        ]);

        Application::create([
            'user_id' => Auth::user()->id,
            'course_name' => $request->course_name,
            'date' => $request->date,
            'payment' => $request->payment,
        ]);

        return redirect()->route('apps');
    }
}
