<?php

namespace App\DataMappers\GwOne;

use App\DTO\ChangePaymentStatusDTO;
use App\Enums\GwOnePaymentStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Http\Requests\GatewayOneStatusChangeRequest;

final class ChangePaymentStatusMapper
{
    public function toDTO(GatewayOneStatusChangeRequest $request): ChangePaymentStatusDTO
    {
        $status = $this->getStatus($request['status']);

        return new ChangePaymentStatusDTO(
            $request['merchant_id'],
            $request['payment_id'],
            $status,
            $request['amount'],
            $request['amount_paid']
        );
    }

    private function getStatus(string $status): int
    {
        $statuses = array_combine(GwOnePaymentStatusEnum::labels(), PaymentStatusEnum::values());

        return $statuses[$status];
    }
}