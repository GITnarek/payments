<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $payer_id
 * @property integer $payment_id
 * @property string $status
 * @property integer $amount
 * @property integer $amount_paid
 * @property integer $gateway_id
 */
class Payment extends Model
{
    use HasFactory;
}
