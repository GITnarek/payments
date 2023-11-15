<?php

namespace App\Services\GatewayOne;

use App\DTO\GatewayOneDTO;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Log;

class CheckSignature
{
    public function process(GatewayOneDTO $gatewayOneDto): void
    {
        $data = $gatewayOneDto->toArray();
        $signature = $data['sign'];
        unset($data['sign']);
        ksort($data);

        $dataString = implode(':', $data);
        $merchantKey = config('payment.merchant_key');
        $hashedData = hash('sha256', $dataString . $merchantKey);

        if ($hashedData !== $signature) {
            Log::error('Invalid signature for Gateway One callback');
            throw new Exception();
        }

//        event(new PaymentStatusChanged($gatewayOneDto->paymentId, $gatewayOneDto->status));

        Log::info('Received valid callback from Gateway One', $data);
    }
}
