<?php

namespace App\Console\Commands;

use App\Models\Gateway;
use Illuminate\Console\Command;

class SetGatewayDailyLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-gateway-daily-limit {gateway} {limit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $gatewayName = $this->argument('gateway');
        $limit = $this->argument('limit');

        $gateway = Gateway::query()
            ->where('name', $gatewayName)
            ->first();

        if ($gateway) {
            $gateway->daily_limit = $limit;
            $gateway->save();

            $this->info("Daily limit for $gatewayName set to $limit");
        } else {
            $this->error("Gateway $gatewayName not found.");
        }
    }
}
