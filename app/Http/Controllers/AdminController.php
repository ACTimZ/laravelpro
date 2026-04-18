<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class AdminController extends Controller
{
    public function index() {
        $apps = Application::with('user')->get();
        return view('admin', compact('apps'));
    }

    public function post($id, Request $request) {
        $request->validate([
            'status' => 'required'
        ]);
        Application::where('id', $id)->update([
            'status' => $request->status
        ]);
        return back();
    }
}
