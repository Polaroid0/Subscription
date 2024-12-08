<?php

namespace App\Services;

class DummyPaymentService
{
    /**
     * Process payment like payment gateway.
     *
     * @return array
     */
    public function processPayment(): array
    {
        return [
            'success' => true,
            'transaction_id' => uniqid('trans_'),
            'message' => 'Payment processed successfully',
        ];
    }
}