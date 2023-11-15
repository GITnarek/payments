<?php

namespace App\DTO;

class GatewayOneDTO
{
    public ?int $merchantId;
    public ?int $paymentId;
    public ?string $status;
    public ?int $amount;
    public ?int $amountPaid;
    public ?int $timestamp;
    public ?string $sign;

    public function __construct(
        ?int $merchantId,
        ?int $paymentId,
        ?string $status,
        ?int $amount,
        ?int $amountPaid,
        ?int $timestamp,
        ?string $sign,
    )
    {
         $this->merchantId = $merchantId;
         $this->paymentId = $paymentId;
         $this->status = $status;
         $this->amount = $amount;
         $this->amountPaid = $amountPaid;
         $this->timestamp = $timestamp;
         $this->sign = $sign;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'merchant_id' => $this->merchantId,
            'payment_id' => $this->paymentId,
            'status' => $this->status,
            'amount' => $this->amount,
            'amount_paid' => $this->amountPaid,
            'timestamp' => $this->timestamp,
            'sign' => $this->sign,
        ];
    }
}
