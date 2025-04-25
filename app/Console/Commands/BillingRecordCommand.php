<?php

namespace App\Console\Commands;

use App\Models\BillingRecord;
use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BillingRecordCommand extends Command
{
    protected $signature = 'billing:run';

    protected $description = 'Add Billing Records';

    public function handle()
    {
        $projects = Project::with('resources')->get();
        foreach ($projects as $project) {
            $records = [];
            $totalAmount = 0;

            foreach ($project->resources as $resource) {
                $config = $resource->config;
                $configPrice = $config['price'] / 43200;
                
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
            Log::info('Billing records price ' . BillingRecord::all());
        }

    }
}
