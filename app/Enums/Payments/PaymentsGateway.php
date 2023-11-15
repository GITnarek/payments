<?php

namespace App\Enums\Payments;

use App\Enums\StringableEnum;

enum PaymentsGateway: string implements StringableEnum
{
    case GATEWAY_ONE = 'gateway_1';
    case GATEWAY_TWO = 'gateway_2';

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }
}
