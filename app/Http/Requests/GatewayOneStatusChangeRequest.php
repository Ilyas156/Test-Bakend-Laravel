<?php

namespace App\Http\Requests;

use App\Enums\GwOnePaymentStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class GatewayOneStatusChangeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'merchant_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'status' =>  ['required', 'string', Rule::in([GwOnePaymentStatusEnum::labels()])],
            'amount' => 'required|integer',
            'amount_paid' => 'required|integer',
            'timestamp' => 'required|integer',
            'sign' => 'required|string'
        ];
    }
}