<?php

namespace App\Enums\Payments;

use App\Enums\Interfaces\StringableEnum;

enum PaymentsGateway: string implements StringableEnum
{
    case GATEWAY1 = 'gateway1';
    case GATEWAY2 = 'gateway2';

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }
}
