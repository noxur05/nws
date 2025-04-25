<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Resource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ResourceTypeSeeder::class,
            ResourceConfigSeeder::class,
        ]);
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Bagtiyar Rejepov',
            'email' => 'km@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        Team::factory(20)->create();

        $teams = Team::all();
        foreach ($teams as $team) {
                $randomUsers = User::where('id', '!=', $team->owner_id)->get()->random(rand(5, 25));
                $userData = [];
                foreach($randomUsers as $user) {
                    $role = [0, 0, 0, 1][rand(0, 3)];
                    $userData[$user->id] = ['role' => $role];
                }
                $team->users()->attach($userData);
        }

        Project::factory(400)->create();

        Resource::factory(800)->create();

        $this->call([
            BillingRecordSeeder::class
        ]);
    }
}
