<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function update(User $user, array $data): User|null
    {
        $user->update($data);
        $user = $user->fresh();

        return $user;
    }
}
