<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $teamIds = $user->teams->pluck('id')
            ->merge($user->ownedTeams->pluck('id'))
            ->unique();

        $projects = Project::whereIn('team_id', $teamIds);
        
        if ($request->filled('search')){
            $search = $request->input('search');
            $projects->where('name', 'like', "%{$search}%");
        }
        $allProjects = $projects->get();
        
        return view('home.index')->with(['projects' => $allProjects]);
    }
}
