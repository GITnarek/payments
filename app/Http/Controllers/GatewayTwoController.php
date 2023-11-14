<?php

namespace App\Http\Controllers;

use App\Services\CheckAuthorization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class GatewayTwoController extends Controller
{

    /**
     * @param CheckAuthorization $checkAuthorization
     */
    public function __construct(private readonly CheckAuthorization $checkAuthorization)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function handleCallback(Request $request): JsonResponse
    {
        $requestData = $request->all();
        $authHeader = $request->header('authorization');

        try {
            $this->checkAuthorization->process($requestData, $authHeader);
        } catch (Throwable $e) {
            Log::error('GatewayTwoController: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 401);
        }

        return response()->json(['message' => 'success']);
    }
}
