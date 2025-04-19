<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $team = Team::inRandomOrder()->first();

        return [
            'name' => fake()->company(),
            'team_id' => $team->id,
        ];
    }
}
