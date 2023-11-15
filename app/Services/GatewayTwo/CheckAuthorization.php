<?php

namespace App\Services\GatewayTwo;

use Exception;
use Illuminate\Support\Facades\Log;

class CheckAuthorization
{
    /**
     * @param array $data
     * @param string $authHeader
     * @throws Exception
     */
    public function process(array $data, string $authHeader): void
    {
        ksort($data);

        $dataString = implode('.', $data);
        $appKey = config('payment.app_key');
        $hashedData = md5($dataString . $appKey);

        if ($hashedData !== $authHeader) {
            Log::error('Invalid authorization for Gateway Two callback');
            throw new Exception();
        }

        Log::info('Received valid callback from Gateway Two', $data);
    }
}
