<?php

namespace App\Enums\Helpers;

use App\Enums\Interfaces\StringableEnum;

class EnumHelper
{
    /**
     * @param StringableEnum[] $enums
     * @return string[]
     */
    public static function values(array $enums): array
    {
        $enumsString = [];

        foreach ($enums as $enum) {
            $enumsString[] = $enum->toString();
        }

        return $enumsString;
    }
}
