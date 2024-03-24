<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class EnsureGwTwoSignatureIsValid
{
    public function handle(Request $request, Closure $next): mixed
    {
        $params = $request->all();
        ksort($params);


        $appKey = config('merchants.gwTwo')['app_key'];

        $signatureString = implode('.', $params);
        $signatureString .= '.' . $appKey;

        $computedSignature = md5($signatureString);
        $providedSignature = $request->header('Authorization');


        if ($computedSignature !== $providedSignature) {
            Log::warning('Подпись запроса не совпадает.', ['computed' => $computedSignature, 'provided' => $providedSignature]);
            return response()->json(['error' => 'Invalid signature in Authorization header.'], 403);
        }

        return $next($request);
    }
}