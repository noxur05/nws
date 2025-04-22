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
                if (Auth::check()) {
                    return redirect('/', 201);
                }
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
            $incomingFields = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|min:8'
            ]);
            $user = Auth::attempt($incomingFields);
            if ($user) {
                return redirect('/');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request) {
        if ($request->isMethod('post')) {
            Auth::logout();
            if (!Auth::check()) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('registration.login');
            }
        }
        return response('MEthod is not post');
    }
}
