<?php

namespace App\Console\Commands;

use App\Models\Resource;
use Illuminate\Console\Command;

class BillResources extends Command
{
    protected $signature = 'billing:run';
    protected $description = 'Bill all active resources every hour';

    public function handle()
    {
        $resources = Resource::where('status', 'active')->get();
    }
}
