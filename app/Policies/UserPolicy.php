<?php

namespace App\Policies;

use App\Enums\User\Role;
use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {}

    public function create(User $user): bool
    {
        return $user->role === Role::ADMINISTRATOR;
    }

    public function update(User $user): bool
    {
        return $user->role === Role::ADMINISTRATOR;
    }

    public function delete(User $user): bool
    {
        return $user->role === Role::ADMINISTRATOR;
    }
}
