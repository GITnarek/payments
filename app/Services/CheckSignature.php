<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class CheckSignature
{
    /**
     * @param array $data
     * @throws Exception
     */
    public function process(array $data): void
    {
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

        Log::info('Received valid callback from Gateway One', $data);
    }
}
