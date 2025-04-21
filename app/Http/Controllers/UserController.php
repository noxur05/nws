<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {

        if ($request->isMethod('post')) {
            dump('POst Method');
            return 'Hello WOrld';
        }

        if ($request->isMethod('get')) {
            return view('registration.register');
        }
        
    }
}
