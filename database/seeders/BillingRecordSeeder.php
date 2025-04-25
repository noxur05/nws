<?php

namespace Database\Seeders;

use App\Models\BillingRecord;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillingRecordSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::with('resources')->get();

        foreach($projects as $project) {
            $records = [];
            $totalAmount = 0;

            foreach ($project->resources as $resource) {
                $config = $resource->config;

                $configPrice = $config['price'] ?? 0;

                $records[] = [
                    'resource_id' => $resource->id,
                    'resource_name' => $resource->name ?? 'Unnamed Resource',
                    'price' => $configPrice,
                ];

                $totalAmount += $configPrice;
            }

            BillingRecord::create([
                'project_id' => $project->id,
                'amount' => $totalAmount,
                'records' => json_encode($records),
            ]);
        }
    }
}
