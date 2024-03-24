<?php

namespace App\Http\Controllers;

use App\DataMappers\GwOne\ChangePaymentStatusMapper;
use App\Http\Requests\GatewayOneStatusChangeRequest;
use App\UseCases\Payments\ChangePaymentStatusService;
use Illuminate\Support\Facades\Log;

final class GatewayOneController extends Controller
{

    public function __construct(
        private ChangePaymentStatusService $service,
        private ChangePaymentStatusMapper $mapper
    )
    {
    }

    public function changePaymentStatus(GatewayOneStatusChangeRequest $request): void
    {
        try {
            $dto = $this->mapper->toDTO($request);
            $this->service->changePaymentStatus($dto);
        } catch (\Throwable $exception) {
            Log::warning($exception->getMessage() . 'Request: {request}', [
                'request' => $request
            ]);
        }
    }
}