<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function show($id) {
        $currentUser = Auth::user();
        $project = Project::find($id);
        $isMember = $project->team->users->contains('id', $currentUser->id);
        $isOwner = $currentUser->id == $project->team->owner_id;
        return view('project.index')->with(['project' => $project, 'isMember' => $isMember, 'isOwner' => $isOwner]);
    }
}
