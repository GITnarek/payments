<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property integer $dailyLimit
 */
class Gateway extends Model
{
    use HasFactory;

    private int $dailyLimit;

    /**
     * @return int
     */
    public function getDailyLimit(): int
    {
        return $this->dailyLimit;
    }

    /**
     * @param int $dailyLimit
     * @return void
     */
    public function setDailyLimit(int $dailyLimit): void
    {
        $this->dailyLimit = $dailyLimit;
    }
}
