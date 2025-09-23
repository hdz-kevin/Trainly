<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    /**
     * Get all possible values of the enum.
     *
     * @return string[]
     */
    public static function values(): array
    {
        return array_map(fn(self $gender) => $gender->value, self::cases());
    }
}
