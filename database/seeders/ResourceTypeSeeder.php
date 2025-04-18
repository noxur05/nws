<?php

namespace Database\Seeders;

use App\Models\ResourceType;
use Illuminate\Database\Seeder;

class ResourceTypeSeeder extends Seeder
{
    public function run(): void
    {
        $objs = [
            'Cloud Servers',
            'Bare Metals',
            'Databases',
            'S3 Storage',
            'Domains & SSL',
            'Email',
            'Personal Network',
        ];
        foreach($objs as $obj) {
            ResourceType::create([
                'name' =>$obj,
                'description' => fake()->paragraphs(random_int(3, 5), asText:true)
            ]);
        }
    }
}
