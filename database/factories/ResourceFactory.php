<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ResourceConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    public function definition(): array
    {
        $project = Project::inRandomOrder()->first();
        $config = ResourceConfig::inRandomOrder()->first();
        return [
            'project_id' => $project->id,
            'config_id'=> $config->id,
            'active' => [1, 1, 0, 1][rand(0, 3)]
        ];
    }
}
