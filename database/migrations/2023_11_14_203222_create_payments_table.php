<?php

use App\Enums\EnumHelper;
use App\Enums\Payments\PaymentsGateway;
use App\Enums\Payments\PaymentsStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('gateway_id');
            $table->enum('status', EnumHelper::values(PaymentsStatus::cases()));
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedInteger('amount_paid')->default(0);
            $table->timestamps();

            $table->foreign('gateway_id')
                ->references('id')
                ->on('gateways');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
