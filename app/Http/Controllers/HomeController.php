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
        $projects = $user->teams->flatMap(function ($team) {
            return $team->projects;
        });
        $ownedProjects = $user->ownedTeams->flatMap(function ($team) {
            return $team->projects;
        });
        $allProjects = $projects->concat($ownedProjects);
        
        return view('home.index')->with(['projects' => $allProjects]);
    }
}
