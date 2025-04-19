<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ResourceTypeSeeder::class
        ]);
        User::factory(99)->create();

        User::factory()->create([
            'name' => 'Bagtiyar Rejepov',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
        ]);

        Team::factory(20)->create();

        $teams = Team::all();
        foreach ($teams as $team) {
                $randomUsers = User::all()->random(rand(30, 50));
                $userData = [];
                foreach($randomUsers as $user) {
                    $role = [0, 0, 0, 1][rand(0, 3)];
                    $userData[$user->id] = ['role' => $role];
                }
                $team->users()->attach($userData);
        }

        Project::factory(50)->create();
    }
}
