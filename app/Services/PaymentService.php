<?php

namespace App\Services;

use App\DTO\GatewayOneDTO;
use App\Models\Gateway;
use App\Models\Payment;
use Illuminate\Support\Carbon;

class PaymentService
{
    public function processPayment()
    {
        $gatewayId = request('gateway_id');
        $amount = request('amount');

        // Get the gateway information
        $gateway = Gateway::findOrFail($gatewayId);

        // Check if the daily limit is reached
        if ($gateway->daily_limit > 0) {
            $todaysPayments = Payment::where('gateway_id', $gatewayId)
                ->whereDate('created_at', Carbon::today())
                ->sum('amount');

            if (($todaysPayments + $amount) > $gateway->daily_limit) {
                return response()->json(['error' => 'Daily limit reached'], 400);
            }
        }

        // Continue with the payment processing logic

        // ...

        // Update the daily limit usage
        if ($gateway->daily_limit > 0) {
            $gateway->increment('daily_limit', $amount);
        }

        return response()->json(['message' => 'Payment processed successfully']);
    }

    public function create(GatewayOneDTO $gatewayOneDto)
    {
        $payment = new Payment();
        $payment->payer_id = $gatewayOneDto->merchantId;
        $payment->payment_id = $gatewayOneDto->paymentId;
        $payment->status = $gatewayOneDto->status;
//        $payment->gateway_id = ;
        $payment->amount = $gatewayOneDto->amount;
        $payment->amount_paid = $gatewayOneDto->amountPaid;
        $payment->save();

        return $payment;
    }
}
