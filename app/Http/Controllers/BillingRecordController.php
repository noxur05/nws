<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingRecordController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = Auth::user();
            
        return view('billing.index');
    }
}
