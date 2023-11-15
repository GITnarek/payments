<?php

namespace App\DTO;

class GatewayTwoDTO
{
    public ?int $project;
    public ?int $invoice;
    public ?string $status;
    public ?int $amount;
    public ?int $amountPaid;
    public ?string $rand;

    public function __construct(
        ?int $project,
        ?int $invoice,
        ?string $status,
        ?int $amount,
        ?int $amountPaid,
        ?string $rand,
    )
    {
        $this->project = $project;
        $this->invoice = $invoice;
        $this->status = $status;
        $this->amount = $amount;
        $this->amountPaid = $amountPaid;
        $this->rand = $rand;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'project' => $this->project,
            'invoice' => $this->invoice,
            'status' => $this->status,
            'amount' => $this->amount,
            'amount_paid' => $this->amountPaid,
            'rand' => $this->rand,
        ];
    }
}
