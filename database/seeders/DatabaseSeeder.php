<?php

namespace Database\Seeders;

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
    }
}
