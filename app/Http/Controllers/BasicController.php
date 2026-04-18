<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class BasicController extends Controller
{
    public function index() {
        return view('home');
    }

    public function apps() {
        $apps = Application::where('user_id', Auth::user()->id)->get();
        return view('apps', compact('apps'));
    }

    public function apps_review($id, Request $request) {
        $request->validate([
            'review' => 'required|min:5|max:255'
        ]);

        Application::where('id', $id)->update([
            'review' => $request->review
        ]);

        return back();
    }

    public function apps_create() {
        return view('apps-create');
    }

    public function apps_create_post(Request $request) {
        $request->validate([
            'course_name' => 'required',
            'date' => 'required',
            'payment' => 'required|in:cash,transfit',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'course_name' => $request->course_name,
            'date' => $request->date,
            'payment' => $request->payment
        ]);

        return redirect()->route('apps');
    }
}
