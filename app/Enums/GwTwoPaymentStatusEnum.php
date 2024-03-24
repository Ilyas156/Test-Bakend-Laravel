<?php

namespace App\Enums;

final class GwTwoPaymentStatusEnum
{
    const CREATED = 'created';
    const IN_PROGRESS = 'inprogress';
    const PAID = 'paid';
    const EXPIRED = 'expired';

    const REJECTED = 'rejected';


    public static function labels(): array
    {
        return [
            'created',
            'inprogress',
            'paid',
            'expired',
            'rejected'
        ];
    }
}