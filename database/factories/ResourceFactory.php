<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ResourceType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    public function definition(): array
    {
        $project = Project::inRandom()->first();
        $type = ResourceType::inRandom()->first();
        return [
            
        ];
    }
}
