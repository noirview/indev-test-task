<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Requests\Profile\UpdateProfileRequest;

use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = auth()->user();
        $user->update($request->validated());

        $user = $user->fresh();

        return response()->json([
            'result' => 'success',
            'message' => 'Profile updated',
            'data' => new ProfileResource($user),
        ]);
    }
}
