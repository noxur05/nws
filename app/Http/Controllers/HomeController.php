<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teams = $user->ownedTeams;
        // $resource_types = ResourceType::all();
        return view('home.index')->with(['teams' => $teams]);
    }
}
