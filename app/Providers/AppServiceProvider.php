<?php

namespace App\Providers;

use App\Models\ResourceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        View::composer('*', function($view) {
            if (!Auth::check()) {
                return;
            }
            $user = Auth::user();
            $projects = $user->teams->flatMap(function ($team) {
                return $team->projects;
            });
            $ownedProjects = $user->ownedTeams->flatMap(function ($team) {
                return $team->projects;
            });

             $globalProjects = $projects->concat($ownedProjects);
            $resource_types = ResourceType::all();
            $teams = $user->teams;
            $view->with(['globalProjects' => $globalProjects, 'globalResourceTypes' => $resource_types, 'globalTeams' => $teams]);
        });
    }
}
