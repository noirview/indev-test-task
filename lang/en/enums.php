<?php

use App\Enums\User\Role as UserRole;

return [

    UserRole::class => [
        UserRole::USER => 'User',
        UserRole::ADMINISTRATOR => 'Administrator',
    ],

];
