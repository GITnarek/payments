<?php

namespace App\Http\Controllers;

use App\Enums\Helpers\EnumHelper;
use App\Enums\Payments\PaymentsGateway;
use App\Models\Transactions;
use App\Services\CheckSignature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;


class GatewayOneController extends Controller
{
    /**
     * @param CheckSignature $checkSignature
     */
    public function __construct(private readonly CheckSignature $checkSignature)
    {
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function handleCallback(Request $request): JsonResponse
    {
        $requestData = $request->all();

        try {
            $this->checkSignature->process($requestData);
        } catch (Throwable $e) {
            Log::error('GatewayOneController: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 400);
        }

        return response()->json(['message' => 'success']);
    }
}
