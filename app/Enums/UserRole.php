<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case GYM_ADMIN = 'gym_admin';

    /**
     * Get all possible values of the enum.
     *
     * @return string[]
     */
    public static function values(): array
    {
        return array_map(fn(self $role) => $role->value, self::cases());
    }
}
