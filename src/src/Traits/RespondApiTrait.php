<?php

namespace marketplace\src\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

trait RespondApiTrait
{
    protected function response(
        JsonResource|ResourceCollection $data,
                                        $status = Response::HTTP_OK
    ): JsonResponse {
        return $data->response()->setStatusCode($status);
    }

    protected function responseError(
        string|array $parameters,
                     $status = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        if (is_string($parameters)) {
            $data = ['message' => $parameters];
        } else {
            [$message, $additionalData] = $parameters;
            $data = [
                'messages' => $message,
                'data' => $additionalData,
            ];
        }

        return response()->json($data, $status);
    }
}
