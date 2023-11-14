<?php

namespace App\Enums\Payments;

use App\Enums\Interfaces\StringableEnum;

enum PaymentsStatus: string implements StringableEnum
{
    case NEW = 'new';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case EXPIRED = 'expired';
    case REJECTED = 'rejected';

    public function toString(): string
    {
        return $this->value;
    }
}
