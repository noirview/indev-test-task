<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Models\User;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::query()
            ->create($request->validated());

        return $this->successResponse(__('responses.users.store'),
            new UserResource($user)
        );
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user = $this->repository->update($user, $request->validated());

        return $this->successResponse(__('responses.users.update'),
            new UserResource($user)
        );
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return $this->successResponse(__('responses.users.delete'));
    }
}
