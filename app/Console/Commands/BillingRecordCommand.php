<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class BillingRecordCommand extends Command
{
    protected $signature = 'billing:run';

    protected $description = 'Add Billing Records';

    public function handle()
    {
        Artisan::call('serve');
        while (true) {
            Log::info('Task executed at ' . now());
            sleep(60);
        }
    }
}
