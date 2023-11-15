<?php

namespace App\Http\Controllers;

use App\DTO\GatewayTwoDTO;
use App\Services\GatewayTwo\CheckAuthorization;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class GatewayTwoController extends Controller
{
    /**
     * @param CheckAuthorization $checkAuthorization
     */
    public function __construct(
        private CheckAuthorization $checkAuthorization
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function handleCallback(): JsonResponse
    {
        $gatewayTwoDto = new GatewayTwoDTO(
            request('project') ?? null,
            request('invoice') ?? null,
            request('status') ?? null,
            request('amount') ?? null,
            request('amount_paid') ?? null,
            request('rand') ?? null,
        );

        $authHeader = request()->header('authorization');

        try {
            $this->checkAuthorization->process($gatewayTwoDto->toArray(), $authHeader);
        } catch (Throwable $e) {
            Log::error('GatewayTwoController: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 401);
        }

        return response()->json(['message' => 'success']);
    }
}
