<?php

namespace App\DataMappers\GwTwo;

use App\DTO\ChangePaymentStatusDTO;
use App\Enums\GwTwoPaymentStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Http\Requests\GatewayTwoStatusChangeRequest;

final class ChangePaymentStatusMapper
{
    public function toDTO(GatewayTwoStatusChangeRequest $request): ChangePaymentStatusDTO
    {
        $status = $this->getStatus($request['status']);

        return new ChangePaymentStatusDTO(
            $request['project'],
            $request['invoice'],
            $status,
            $request['amount'],
            $request['amount_paid']
        );
    }

    private function getStatus(string $status): int
    {
        $statuses = array_combine(GwTwoPaymentStatusEnum::labels(), PaymentStatusEnum::values());

        return $statuses[$status];
    }
}