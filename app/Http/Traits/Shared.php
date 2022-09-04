<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait Shared {

	public function formatResponse($data, $code = 200): JsonResponse
    {

        $json = array(
            'status' => true,
            'message' => 'Request was a success'
        );

        $merged = array_merge($json, $data);

        return response()->json($merged, $code);
    }

    protected function forbidden($message = null) : JsonResponse
    {
        return $this->formatResponse([
            'status' => false,
            'message' => $message ?: 'Forbidden'
        ], 403);
    }

    protected function notFound($message = null) : JsonResponse
    {
        return $this->formatResponse([
            'status' => false,
            'message' => $message ?: 'Not Found'
        ], 404);
    }
}
