<?php

namespace App\Listeners;

use App\Events\PaymentStatusChanged;

class PaymentStatusChangeListener
{
    /**
     * Handle the event.
     */
    public function handle(PaymentStatusChanged $event): void
    {
//        $payment = Payment::find($event->paymentId);
//        $payment->status = $event->newStatus;
//        $payment->save();

        Log::info("Payment {$event->paymentId} status changed to {$event->newStatus}");
    }
}
