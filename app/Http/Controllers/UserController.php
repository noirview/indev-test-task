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

        return $this->successResponse('User created',
            new UserResource($user)
        );
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        $user->fresh();

        return $this->successResponse('User updated',
            new UserResource($user)
        );
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return $this->successResponse('User deleted');
    }
}
