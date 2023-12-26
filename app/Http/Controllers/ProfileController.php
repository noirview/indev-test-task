<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Http\Requests\Profile\UpdateProfileRequest;

use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = auth()->user();
        $user = $this->repository->update($user, $request->validated());

        return $this->successResponse('Profile updated',
            new ProfileResource($user)
        );
    }
}
