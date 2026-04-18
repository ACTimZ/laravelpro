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

    public function update($id, Request $request) {
        $request->validate([
            'status' => 'required|in:new,continue,end'
        ]);

        Application::find($id)->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Статус заявки №' . $id . 'поменялся!');
    }
}
