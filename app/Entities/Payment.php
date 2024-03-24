<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Throwable;

/**
 * @property int $status
 */
final class Payment extends Model
{

    /**
     * @throws Throwable
     */
    public function changeStatus(int $status): void
    {
        $this->status = $status;

        $this->saveOrFail();
    }
}