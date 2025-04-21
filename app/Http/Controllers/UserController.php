<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $incomingFields = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:8'
            ]);
            $incomingFields['password'] = bcrypt($incomingFields['password']);
            if ($user = User::create($incomingFields)) {
                Auth::login($user);
                return redirect('/');
            }
        }

        if ($request->isMethod('get')) {
            return view('registration.register');
        }
    }

    public function login(Request $request) {
        if ($request->isMethod('get')) {
            return view('registration.login');
        }

        if ($request->isMethod('post')) {
            return view('registration.login');
        }
    }
}
