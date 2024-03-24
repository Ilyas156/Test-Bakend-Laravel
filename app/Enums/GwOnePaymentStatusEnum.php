<?php

namespace App\Enums;

final class GwOnePaymentStatusEnum
{
    const NEW = 'new';
    const PENDING = 'pending';
    const COMPLETED = 'completed';
    const EXPIRED = 'expired';

    const REJECTED = 'rejected';


    public static function labels(): array
    {
        return [
            'new',
            'pending',
            'completed',
            'expired',
            'rejected'
        ];
    }
}