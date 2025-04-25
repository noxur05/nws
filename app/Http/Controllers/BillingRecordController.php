<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingRecordController extends Controller
{
    public function index(Request $request)
    {
        return view('billing.index');
    }
}
