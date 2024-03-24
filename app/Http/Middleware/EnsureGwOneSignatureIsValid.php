<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class EnsureGwOneSignatureIsValid
{
    public function handle(Request $request, Closure $next): mixed
    {
        $params = $request->except('sign');
        ksort($params);

        $merchantKey = config('merchants.gwOne')['merchant_key'];
        $signatureString = implode(':', $params);
        $signatureString .= ':' . $merchantKey;

        $computedSignature = hash('sha256', $signatureString);
        $providedSignature = $request->input('sign');

        if ($computedSignature !== $providedSignature) {
            Log::warning(
                'Подпись запроса не совпадает. Computed: {computed}, Provided: {provided}',
                ['computed' => $computedSignature, 'provided' => $providedSignature]
            );
            return response()->json(['error' => 'Invalid signature.'], 403);
        }

        return $next($request);
    }
}