<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Role extends Enum implements LocalizedEnum
{
    const USER = 0;
    const ADMINISTRATOR = 1;
}
