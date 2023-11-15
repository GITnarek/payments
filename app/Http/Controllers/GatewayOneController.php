<?php

namespace App\Http\Controllers;

use App\DTO\GatewayOneDTO;
use App\Services\GatewayOne\CheckSignature;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;


class GatewayOneController extends Controller
{
    /**
     * @param CheckSignature $checkSignature
     */
    public function __construct(
        private CheckSignature $checkSignature
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function handleCallback(): JsonResponse
    {
        $gatewayOneDto = new GatewayOneDTO(
            request('merchant_id') ?? null,
            request('payment_id') ?? null,
            request('status') ?? null,
            request('amount') ?? null,
            request('amount_paid') ?? null,
            request('timestamp') ?? null,
            request('sign') ?? null,
        );

        try {
            $this->checkSignature->process($gatewayOneDto);
            $this->checkSignature->create($gatewayOneDto);
        } catch (Throwable $e) {
            Log::error('GatewayOneController: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 400);
        }

        return response()->json(['message' => 'success']);
    }
}
