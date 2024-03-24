<?php

namespace App\UseCases\Payments;

use App\DTO\ChangePaymentStatusDTO;
use App\Entities\Payment;

final class ChangePaymentStatusService
{

    /**
     * @throws \Throwable
     */
    public function changePaymentStatus(ChangePaymentStatusDTO $dto): void
    {
        $payment = $this->findPayment($dto);
        $payment->changeStatus($dto->status);
    }

    private function findPayment(ChangePaymentStatusDTO $dto): Payment
    {
        return Payment::where('external_id', $dto->externalId)->where('merchant_id', $dto->merchantId)->firstOrFail();
    }
}