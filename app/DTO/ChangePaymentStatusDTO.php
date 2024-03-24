<?php

namespace App\DTO;

final class ChangePaymentStatusDTO
{
    public function __construct(
        public int $merchantId,
        public int $externalId,
        public int $status,
        public int $amount,
        public int $amountPaid
    )
    {
    }
}