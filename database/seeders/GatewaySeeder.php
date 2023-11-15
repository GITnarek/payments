<?php

namespace Database\Seeders;

use App\Enums\Payments\PaymentsGateway;
use App\Models\Gateway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gateway::query()->insert([
            'name' => PaymentsGateway::GATEWAY_ONE->toString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Gateway::query()->insert([
            'name' => PaymentsGateway::GATEWAY_TWO->toString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
