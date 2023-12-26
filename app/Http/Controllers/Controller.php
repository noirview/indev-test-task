<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private function response(int $status, string $result, string $message, JsonResource $resource = null): JsonResponse
    {
        $json = [
            'result' => $result,
            'message' => $message,
        ];

        if (!is_null($resource)) {
            $json['data'] = $resource;
        }

        return response()->json($json, $status);
    }

    protected function successResponse(string $message, JsonResource $resource = null): JsonResponse
    {
        return $this->response(Response::HTTP_OK, 'success', $message, $resource);
    }
}
