<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Models\User;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::query()
            ->create($request->validated());

        return response()->json([
            'result' => 'success',
            'message' => 'User created',
            'data' => new UserResource($user),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        $user->fresh();

        return response()->json([
            'result' => 'success',
            'message' => 'User updated',
            'data' => new UserResource($user),
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'result' => 'success',
            'message' => 'User deleted',
        ]);
    }
}
