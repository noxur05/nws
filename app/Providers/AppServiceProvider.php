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
            $resource_types = ResourceType::all();
            $view->with(['projects' => $projects, 'resource_types' => $resource_types]);
        });
    }
}
