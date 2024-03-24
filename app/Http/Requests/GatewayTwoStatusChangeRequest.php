<?php

namespace App\Http\Requests;


use App\Enums\GwTwoPaymentStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class GatewayTwoStatusChangeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'project' => 'required|integer',
            'invoice' => 'required|integer',
            'status' =>  ['required', 'string', Rule::in([GwTwoPaymentStatusEnum::labels()])],
            'amount' => 'required|integer',
            'amount_paid' => 'required|integer',
            'rand' => 'required|string'
        ];
    }
}