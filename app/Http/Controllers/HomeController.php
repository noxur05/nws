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
        $owned_teams = $user->ownedTeams()->withCount(['users'])->get();
        
        return view('home.index')->with(['owned_teams' => $owned_teams]);
    }
}
