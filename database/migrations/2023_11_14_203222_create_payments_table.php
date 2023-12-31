<?php

use App\Enums\Helpers\EnumHelper;
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
            $table->unsignedBigInteger('payer_id');
            $table->unsignedInteger('payment_id');
            $table->enum('gateways', EnumHelper::values(PaymentsGateway::cases()));
            $table->enum('status', EnumHelper::values(PaymentsStatus::cases()));
            $table->unsignedDecimal('amount');
            $table->unsignedDecimal('amount_paid');
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('users');
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
