<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bagtiyar Rejepov',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
        ]);
    }
}
