<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    public function definition(): array
    {
        $owner = User::inRandomOrder()->first();
        return [
            'name' => fake()->company(),
            'owner_id' => $owner->id
        ];
    }
}
