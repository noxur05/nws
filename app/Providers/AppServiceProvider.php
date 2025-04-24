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

            $resource_types = ResourceType::all();
            $teams = $user->teams;
            $ownedTeams = $user->ownedTeams()->withCount(['users'])->get();
            $view->with(['globalOwnedTeams' => $ownedTeams, 'globalResourceTypes' => $resource_types, 'globalTeams' => $teams]);
        });
    }
}
