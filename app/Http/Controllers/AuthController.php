<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;



class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $request->authenticate();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
