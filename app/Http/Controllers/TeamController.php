<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function show($id, Request $request) {
        $currentUser = Auth::user();
        $search = $request->input('search');

        $query = Team::with([
            'users' => function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', "%{$search}%");
                }
            },
            'projects' => function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', "%{$search}%");
                }
            }
        ]);

        $team = $query->find($id);
        if ($team) {
            $isOwner = $currentUser->id == $team->owner_id;
            $isMember = $team->users->contains('id', $currentUser->id);
            
            return view('team.index')->with(['team' => $team, 'users' => $team->users,'projects' => $team->projects,'isOwner' => $isOwner, 'isMember' => $isMember]);
        }

        return "Not Found";
    }
}
