<?php

namespace App\Enums;

class PaymentStatusEnum
{
    const NEW = 0;
    const PENDING = 1;
    const COMPLETED = 2;
    const EXPIRED = 3;

    const REJECTED = 4;

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

    public static function values(): array
    {
        return [
            self::NEW,
            self::PENDING,
            self::COMPLETED,
            self::EXPIRED,
            self::REJECTED
        ];
    }
}