<?php

namespace Database\Seeders;

use App\Enums\User\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'email' => 'admin@admin.com',
            'password' => '43211234',
            'role' => Role::ADMINISTRATOR,
        ]);
    }
}
