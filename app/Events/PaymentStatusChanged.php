<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $paymentId;
    public $newStatus;

    /**
     * Create a new event instance.
     */
    public function __construct($paymentId, $newStatus)
    {
        $this->paymentId = $paymentId;
        $this->newStatus = $newStatus;
    }
}
