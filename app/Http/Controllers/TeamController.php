<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function show($id) {
        $currentUser = Auth::user();
        $team = Team::find($id);
        $isOwner = $currentUser->id == $team->owner_id;

        if ($isOwner) {
            $team->with(['users', 'projects']);
        }

        return view('team.index')->with(['team' => $team]);
    }
}
